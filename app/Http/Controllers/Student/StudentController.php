<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Document;
use App\Models\Program;
use App\Models\Setting;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $profile = $user->studentProfile;
        $applications = Application::where('user_id', $user->id)->with('program.university')->latest()->take(5)->get();
        $documents = Document::where('user_id', $user->id)->latest()->get();
        $pendingServiceChargeApplications = Application::where('user_id', $user->id)
            ->with('program.university')
            ->whereIn('status', ['accepted', 'offer_letter_issued', 'visa_processing'])
            ->whereNotIn('service_charge_status', ['paid', 'waived'])
            ->latest()
            ->get();

        return view('student.dashboard', compact('profile', 'applications', 'documents', 'pendingServiceChargeApplications'));
    }

    public function profile()
    {
        $profile = auth()->user()->studentProfile;
        return view('student.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'nullable|date',
            'gender'        => 'nullable|in:male,female,other',
            'nationality'   => 'nullable|string|max:100',
            'phone'         => 'nullable|string|max:30',
            'address'       => 'nullable|string|max:500',
            'passport_number' => 'nullable|string|max:50',
        ]);

        auth()->user()->studentProfile->update($request->only([
            'date_of_birth',
            'gender',
            'nationality',
            'phone',
            'address',
            'passport_number'
        ]));

        return back()->with('success', 'Profile updated successfully.');
    }

    public function documents()
    {
        $documents = Document::where('user_id', auth()->id())->latest()->get();
        return view('student.documents', compact('documents'));
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document_type' => 'required|string|max:100',
            'file'          => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $path = $request->file('file')->store('documents/' . auth()->id(), 'private');

        $doc = Document::create([
            'user_id'       => auth()->id(),
            'document_type' => $request->document_type,
            'file_path'     => $path,
            'name'          => $request->file('file')->getClientOriginalName(),
            'status'        => 'pending',
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['status' => 'success', 'document' => $doc]);
        }

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function applications()
    {
        $applications = Application::where('user_id', auth()->id())
            ->with('program.university')
            ->latest()
            ->paginate(10);

        $pendingServiceChargeApplications = Application::where('user_id', auth()->id())
            ->with('program.university')
            ->whereIn('status', ['accepted', 'offer_letter_issued', 'visa_processing'])
            ->whereNotIn('service_charge_status', ['paid', 'waived'])
            ->latest()
            ->get();

        return view('student.applications.index', compact('applications', 'pendingServiceChargeApplications'));
    }

    public function createApplication(Request $request)
    {
        $user = auth()->user();
        if (!$user->isProfileComplete()) {
            return redirect()->route('student.onboarding')
                ->with('warning', 'Please complete your profile before applying.');
        }

        $selectedProgramId = $request->query('program_id');
        $universities = University::where('is_active', true)->with('programs')->get();
        $applicationFee = $this->getApplicationFeeConfig();

        return view('student.applications.create', compact('universities', 'selectedProgramId', 'applicationFee'));
    }

    public function showOnboarding()
    {
        $user = auth()->user();
        $profile = $user->studentProfile;
        $documents = $user->documents;
        return view('student.onboarding', compact('user', 'profile', 'documents'));
    }

    public function saveOnboarding(Request $request)
    {
        // Handling multi-step save logic here
        // For simplicity in a single controller call, we can check the step provided
        $step = $request->input('step');
        $user = auth()->user();

        if ($step == 1) {
            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
            ]);
            $user->studentProfile->update($request->only('first_name', 'last_name'));
        } elseif ($step == 2) {
            $request->validate([
                'gender' => 'required|in:male,female',
                'nationality' => 'required|string',
                'date_of_birth' => 'required|date',
                'passport_number' => 'required|string',
                'passport_expiry' => 'required|date',
                'address' => 'required|string',
            ]);
            $user->studentProfile->update($request->except('_token', 'step'));
        } elseif ($step == 3) {
            // Handled by uploadDocument usually, but we can allow a final check or redirect
            if ($user->isProfileComplete()) {
                return response()->json(['status' => 'success', 'message' => 'Profile completed!']);
            }
            return response()->json(['status' => 'error', 'message' => 'Missing documents.']);
        }

        return response()->json(['status' => 'success']);
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'program_id'      => 'required|exists:programs,id',
            'intake_year'     => 'required|digits:4|integer|min:2024',
            'intake_semester' => 'required|in:spring,fall',
            'cover_letter'    => 'nullable|string|max:2000',
        ]);

        session([
            'student_application_checkout' => [
                'program_id' => (int) $request->program_id,
                'intake_year' => (int) $request->intake_year,
                'intake_semester' => (string) $request->intake_semester,
                'cover_letter' => (string) $request->input('cover_letter', ''),
            ],
        ]);

        return redirect()->route('student.applications.payment');
    }

    public function applicationPayment()
    {
        $payload = session('student_application_checkout');

        if (! $payload) {
            return redirect()->route('student.applications.create')
                ->with('warning', 'Please complete the application form before paying the application fee.');
        }

        $program = Program::with('university')->findOrFail($payload['program_id']);
        $applicationFee = $this->getApplicationFeeConfig();

        return view('applications.fee-payment', [
            'layoutName' => 'layouts.student',
            'backRoute' => route('student.applications.create', ['program_id' => $program->id]),
            'submitRoute' => route('student.applications.payment.complete'),
            'dashboardRoute' => route('student.applications.index'),
            'applicationFee' => $applicationFee,
            'program' => $program,
            'studentName' => auth()->user()->name,
            'flowLabel' => 'Student Application Fee',
            'payerLabel' => 'Applicant',
            'showStudentContext' => false,
        ]);
    }

    public function completeApplicationPayment(Request $request)
    {
        $payload = session('student_application_checkout');

        if (! $payload) {
            return redirect()->route('student.applications.create')
                ->with('warning', 'Your application session expired. Please fill the form again.');
        }

        $request->validate([
            'payment_method' => 'required|in:card,bank_transfer,mobile_money',
            'payment_reference' => 'required|string|max:255',
            'payment_notes' => 'nullable|string|max:1000',
        ]);

        $program = Program::with('university')->findOrFail($payload['program_id']);
        $applicationFee = $this->getApplicationFeeConfig();

        $application = Application::create([
            'user_id' => auth()->id(),
            'university_id' => $program->university_id,
            'program_id' => $program->id,
            'intake_year' => $payload['intake_year'],
            'intake_semester' => $payload['intake_semester'],
            'cover_letter' => $payload['cover_letter'] ?: null,
            'status' => 'submitted',
            'submitted_at' => now(),
            'application_fee_amount' => $applicationFee['amount'],
            'application_fee_currency' => $applicationFee['currency'],
            'application_fee_status' => $applicationFee['amount'] > 0 ? 'paid' : 'waived',
            'application_fee_paid_at' => now(),
            'application_fee_reference' => $request->payment_reference,
            'application_fee_method' => $request->payment_method,
            'application_fee_notes' => $request->payment_notes,
            'service_charge_amount' => (float) ($program->service_charge_usd ?? 0),
            'service_charge_currency' => 'USD',
            'service_charge_status' => ((float) ($program->service_charge_usd ?? 0) > 0) ? 'unpaid' : 'waived',
        ]);

        session()->forget('student_application_checkout');

        return redirect()->route('student.applications.index')
            ->with('success', 'Application fee received. Your application ' . $application->application_number . ' is now ready for processing.');
    }

    public function serviceChargePayment($id)
    {
        $application = Application::where('user_id', auth()->id())
            ->with('program.university')
            ->findOrFail($id);

        abort_unless($this->applicationAllowsServiceCharge($application), 404);

        $serviceCharge = $this->getServiceChargeConfig($application);
        $gatewayOptions = $this->getGatewayOptions();

        return view('applications.service-charge-payment', [
            'layoutName' => 'layouts.student',
            'backRoute' => route('student.applications.index'),
            'submitRoute' => route('student.applications.service_charge.complete', $application->id),
            'dashboardRoute' => route('student.dashboard'),
            'application' => $application,
            'serviceCharge' => $serviceCharge,
            'gatewayOptions' => $gatewayOptions,
            'studentName' => auth()->user()->name,
            'flowLabel' => 'Admission Service Charge',
            'payerLabel' => 'Applicant',
            'showStudentContext' => false,
        ]);
    }

    public function completeServiceChargePayment(Request $request, $id)
    {
        $application = Application::where('user_id', auth()->id())
            ->with('program.university')
            ->findOrFail($id);

        abort_unless($this->applicationAllowsServiceCharge($application), 404);

        $gatewayOptions = $this->getGatewayOptions();

        $request->validate([
            'payment_gateway' => 'required|in:' . implode(',', array_keys($gatewayOptions)),
            'payment_reference' => 'required|string|max:255',
            'payment_notes' => 'nullable|string|max:1000',
        ]);

        $application->update([
            'service_charge_amount' => (float) ($application->service_charge_amount ?: ($application->program->service_charge_usd ?? 0)),
            'service_charge_currency' => $application->service_charge_currency ?: 'USD',
            'service_charge_status' => ((float) ($application->service_charge_amount ?: ($application->program->service_charge_usd ?? 0)) > 0) ? 'paid' : 'waived',
            'service_charge_paid_at' => now(),
            'service_charge_reference' => $request->payment_reference,
            'service_charge_method' => $request->payment_gateway,
            'service_charge_notes' => $request->payment_notes,
        ]);

        return redirect()->route('student.applications.index')
            ->with('success', 'Service charge received. Your admission processing can now continue.');
    }

    protected function getApplicationFeeConfig(): array
    {
        $amount = (float) Setting::get('application_fee_amount', 120);
        $currency = strtoupper((string) Setting::get('application_fee_currency', 'USD'));
        $instructions = (string) Setting::get(
            'application_fee_instructions',
            'Use the payment form below to record the application fee required before documents and admission processing can begin.'
        );

        return [
            'amount' => $amount,
            'currency' => $currency ?: 'USD',
            'instructions' => $instructions,
        ];
    }

    protected function getServiceChargeConfig(Application $application): array
    {
        return [
            'amount' => (float) ($application->service_charge_amount ?: ($application->program->service_charge_usd ?? 0)),
            'currency' => strtoupper((string) ($application->service_charge_currency ?: 'USD')),
            'instructions' => (string) Setting::get(
                'service_charge_instructions',
                'Pay the service charge after acceptance so admission processing, offer documentation, and next-step support can continue.'
            ),
        ];
    }

    protected function getGatewayOptions(): array
    {
        $gateways = [];

        if (Setting::get('paystack_enabled', false)) {
            $gateways['paystack'] = [
                'label' => 'Paystack',
                'currency' => strtoupper((string) Setting::get('paystack_currency', 'USD')),
            ];
        }

        if (Setting::get('flutterwave_enabled', false)) {
            $gateways['flutterwave'] = [
                'label' => 'Flutterwave',
                'currency' => strtoupper((string) Setting::get('flutterwave_currency', 'USD')),
            ];
        }

        if ($gateways === []) {
            $gateways['paystack'] = ['label' => 'Paystack', 'currency' => 'USD'];
            $gateways['flutterwave'] = ['label' => 'Flutterwave', 'currency' => 'USD'];
        }

        return $gateways;
    }

    protected function applicationAllowsServiceCharge(Application $application): bool
    {
        return in_array($application->status, ['accepted', 'offer_letter_issued', 'visa_processing'], true)
            && ! in_array($application->service_charge_status, ['paid', 'waived'], true);
    }
}
