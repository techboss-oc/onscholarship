<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');

        $query = Application::with(['student.user', 'program.university']);

        if ($status) {
            $query->where('status', $status);
        }

        $applications = $query->latest()->paginate(20);

        return view('admin.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::with(['student.user', 'student.agent.user', 'program.university', 'documents'])->findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::with('program')->findOrFail($id);

        $request->validate([
            'status' => 'required|in:draft,submitted,under_review,documents_required,accepted,rejected,offer_letter_issued,visa_processing,completed',
            'admin_notes' => 'nullable|string'
        ]);

        $payload = [
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ];

        if (in_array($request->status, ['accepted', 'offer_letter_issued', 'visa_processing'], true)) {
            $payload['service_charge_amount'] = (float) ($application->service_charge_amount ?: ($application->program->service_charge_usd ?? 0));
            $payload['service_charge_currency'] = $application->service_charge_currency ?: 'USD';
            $payload['service_charge_status'] = $payload['service_charge_amount'] > 0 ? ($application->service_charge_status ?: 'unpaid') : 'waived';
        }

        $application->update($payload);

        return back()->with('success', 'Application status updated to ' . ucfirst($request->status));
    }
}
