<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Setting;
use Illuminate\Http\Request;

class ApplicationFeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query()
            ->with(['student.user', 'program.university', 'agent']);

        if ($request->filled('fee_status')) {
            $query->where('application_fee_status', $request->string('fee_status')->toString());
        }

        if ($request->filled('q')) {
            $term = trim((string) $request->input('q'));
            $escaped = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $term);
            $like = '%' . $escaped . '%';

            $query->where(function ($builder) use ($like) {
                $builder->where('application_number', 'like', $like)
                    ->orWhere('application_fee_reference', 'like', $like)
                    ->orWhereHas('student.user', function ($studentQuery) use ($like) {
                        $studentQuery->where('name', 'like', $like)
                            ->orWhere('email', 'like', $like);
                    })
                    ->orWhereHas('program', function ($programQuery) use ($like) {
                        $programQuery->where('name', 'like', $like);
                    })
                    ->orWhereHas('program.university', function ($universityQuery) use ($like) {
                        $universityQuery->where('name', 'like', $like);
                    });
            });
        }

        $applications = $query->latest()->paginate(15)->appends($request->query());

        $settings = [
            'amount' => (float) Setting::get('application_fee_amount', 120),
            'currency' => strtoupper((string) Setting::get('application_fee_currency', 'USD')),
            'instructions' => (string) Setting::get(
                'application_fee_instructions',
                'Use the payment step to collect the application fee before admission processing begins.'
            ),
        ];

        $stats = [
            'total' => Application::count(),
            'paid' => Application::where('application_fee_status', 'paid')->count(),
            'unpaid' => Application::where('application_fee_status', 'unpaid')->count(),
            'waived' => Application::where('application_fee_status', 'waived')->count(),
            'collected' => (float) Application::where('application_fee_status', 'paid')->sum('application_fee_amount'),
        ];

        return view('admin.application_fees.index', compact('applications', 'settings', 'stats'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'application_fee_amount' => 'required|numeric|min:0',
            'application_fee_currency' => 'required|string|max:10',
            'application_fee_instructions' => 'nullable|string|max:2000',
        ]);

        Setting::set('application_fee_amount', number_format((float) $validated['application_fee_amount'], 2, '.', ''), 'text', 'fees');
        Setting::set('application_fee_currency', strtoupper($validated['application_fee_currency']), 'text', 'fees');
        Setting::set('application_fee_instructions', $validated['application_fee_instructions'] ?? '', 'text', 'fees');

        return back()->with('success', 'Application fee settings updated successfully.');
    }

    public function updateApplicationFee(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $validated = $request->validate([
            'application_fee_status' => 'required|in:unpaid,paid,waived',
            'application_fee_reference' => 'nullable|string|max:255',
            'application_fee_method' => 'nullable|string|max:100',
            'application_fee_notes' => 'nullable|string|max:1000',
        ]);

        $status = $validated['application_fee_status'];

        $application->update([
            'application_fee_status' => $status,
            'application_fee_paid_at' => in_array($status, ['paid', 'waived'], true) ? now() : null,
            'application_fee_reference' => $validated['application_fee_reference'] ?? $application->application_fee_reference,
            'application_fee_method' => $validated['application_fee_method'] ?? $application->application_fee_method,
            'application_fee_notes' => $validated['application_fee_notes'] ?? $application->application_fee_notes,
        ]);

        return back()->with('success', 'Application fee status updated successfully.');
    }
}
