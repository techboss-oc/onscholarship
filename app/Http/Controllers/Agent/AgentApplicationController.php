<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Program;
use App\Models\Setting;
use App\Models\University;
use Illuminate\Http\Request;

class AgentApplicationController extends Controller
{
    public function create(Request $request)
    {
        $agent = auth()->user();
        $students = $agent->agentStudents()->with('user')->whereHas('user')->latest()->get();
        $universities = University::where('is_active', true)->with('programs')->get();
        $selectedProgramId = $request->query('program_id');
        $selectedStudentId = $request->query('student_id');
        $applicationFee = $this->getApplicationFeeConfig();

        return view('agent.applications.create', compact(
            'students',
            'universities',
            'selectedProgramId',
            'selectedStudentId',
            'applicationFee'
        ));
    }

    public function index()
    {
        $user = auth()->user();

        $applications = $user->agentApplications()
            ->with(['student.user', 'program.university'])
            ->latest()
            ->paginate(15);

        $pendingServiceChargeApplications = $user->agentApplications()
            ->with(['student.user', 'program.university'])
            ->whereIn('status', ['accepted', 'offer_letter_issued', 'visa_processing'])
            ->whereNotIn('service_charge_status', ['paid', 'waived'])
            ->latest()
            ->get();

        return view('agent.applications.index', compact('applications', 'pendingServiceChargeApplications'));
    }

    public function show($id)
    {
        $user = auth()->user();

        $application = $user->agentApplications()
            ->with(['student.user', 'program.university', 'documents'])
            ->findOrFail($id);

        $gatewayOptions = $this->getGatewayOptions();

        return view('agent.applications.show', compact('application', 'gatewayOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_profile_id' => 'required|exists:student_profiles,id',
            'program_id' => 'required|exists:programs,id',
            'intake_year' => 'required|digits:4|integer|min:2024',
            'intake_semester' => 'required|in:spring,fall',
            'cover_letter' => 'nullable|string|max:2000',
        ]);

        $agent = auth()->user();
        $student = $agent->agentStudents()->with('user')->findOrFail($request->student_profile_id);

        session([
            'agent_application_checkout' => [
                'student_profile_id' => (int) $student->id,
                'program_id' => (int) $request->program_id,
                'intake_year' => (int) $request->intake_year,
                'intake_semester' => (string) $request->intake_semester,
                'cover_letter' => (string) $request->input('cover_letter', ''),
            ],
        ]);

        return redirect()->route('agent.applications.payment');
    }

    public function payment()
    {
        $payload = session('agent_application_checkout');

        if (! $payload) {
            return redirect()->route('agent.applications.create')
                ->with('warning', 'Please complete the application form before paying the application fee.');
        }

        $agent = auth()->user();
        $student = $agent->agentStudents()->with('user')->findOrFail($payload['student_profile_id']);
        $program = Program::with('university')->findOrFail($payload['program_id']);
        $applicationFee = $this->getApplicationFeeConfig();

        return view('applications.fee-payment', [
            'layoutName' => 'layouts.agent',
            'backRoute' => route('agent.applications.create', ['program_id' => $program->id, 'student_id' => $student->id]),
            'submitRoute' => route('agent.applications.payment.complete'),
            'dashboardRoute' => route('agent.applications.index'),
            'applicationFee' => $applicationFee,
            'program' => $program,
            'studentName' => $student->user?->name ?? 'Managed Student',
            'flowLabel' => 'Agent Application Fee',
            'payerLabel' => 'Managed Student',
            'showStudentContext' => true,
        ]);
    }

    public function completePayment(Request $request)
    {
        $payload = session('agent_application_checkout');

        if (! $payload) {
            return redirect()->route('agent.applications.create')
                ->with('warning', 'Your application session expired. Please fill the form again.');
        }

        $request->validate([
            'payment_method' => 'required|in:card,bank_transfer,mobile_money',
            'payment_reference' => 'required|string|max:255',
            'payment_notes' => 'nullable|string|max:1000',
        ]);

        $agent = auth()->user();
        $student = $agent->agentStudents()->with('user')->findOrFail($payload['student_profile_id']);
        $program = Program::with('university')->findOrFail($payload['program_id']);
        $applicationFee = $this->getApplicationFeeConfig();

        $application = Application::create([
            'user_id' => $student->user_id,
            'agent_id' => $agent->id,
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

        session()->forget('agent_application_checkout');

        return redirect()->route('agent.applications.index')
            ->with('success', 'Application fee received. Application ' . $application->application_number . ' is now queued for processing.');
    }

    public function serviceChargePayment($id)
    {
        $application = auth()->user()->agentApplications()
            ->with(['student.user', 'program.university'])
            ->findOrFail($id);

        abort_unless($this->applicationAllowsServiceCharge($application), 404);

        $serviceCharge = $this->getServiceChargeConfig($application);
        $gatewayOptions = $this->getGatewayOptions();

        return view('applications.service-charge-payment', [
            'layoutName' => 'layouts.agent',
            'backRoute' => route('agent.applications.show', $application->id),
            'submitRoute' => route('agent.applications.service_charge.complete', $application->id),
            'dashboardRoute' => route('agent.dashboard'),
            'application' => $application,
            'serviceCharge' => $serviceCharge,
            'gatewayOptions' => $gatewayOptions,
            'studentName' => $application->student?->user?->name ?? 'Managed Student',
            'flowLabel' => 'Admission Service Charge',
            'payerLabel' => 'Managed Student',
            'showStudentContext' => true,
        ]);
    }

    public function completeServiceChargePayment(Request $request, $id)
    {
        $application = auth()->user()->agentApplications()
            ->with(['student.user', 'program.university'])
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

        return redirect()->route('agent.applications.show', $application->id)
            ->with('success', 'Service charge received. Admission processing can now continue for this student.');
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
