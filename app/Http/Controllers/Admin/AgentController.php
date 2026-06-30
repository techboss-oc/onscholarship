<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AgentApprovedMail;
use App\Models\AgentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    public function index()
    {
        $agents = AgentProfile::with('user')->paginate(15);
        return view('admin.agents.index', compact('agents'));
    }

    public function approve($id)
    {
        $agent = AgentProfile::with('user')->findOrFail($id);
        $wasApproved = $agent->approval_status === 'approved';

        $agent->update([
            'approval_status' => 'approved',
            'approved_at' => now(),
            'approved_by' => auth()->id(),
        ]);

        if (! $wasApproved && $agent->user?->email) {
            try {
                Mail::to($agent->user->email)->send(new AgentApprovedMail($agent->fresh(['user', 'approvedBy'])));
            } catch (\Throwable $exception) {
                report($exception);
            }
        }
        
        return redirect()->back()->with('success', 'Agent approved successfully.');
    }

    public function suspend($id)
    {
        $agent = AgentProfile::findOrFail($id);
        $agent->update(['approval_status' => 'suspended']);
        
        return redirect()->back()->with('success', 'Agent suspended successfully.');
    }
}
