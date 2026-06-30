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
        
        $query = Application::with(['student', 'program.university']);
        
        if ($status) {
            $query->where('status', $status);
        }
        
        $applications = $query->latest()->paginate(20);
        
        return view('admin.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::with(['student.user', 'program.university', 'documents'])->findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,accepted,rejected,enrolled',
            'admin_notes' => 'nullable|string'
        ]);

        $application->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return back()->with('success', 'Application status updated to ' . ucfirst($request->status));
    }
}
