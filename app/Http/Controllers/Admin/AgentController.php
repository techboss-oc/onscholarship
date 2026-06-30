<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgentProfile;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = AgentProfile::with('user')->paginate(15);
        return view('admin.agents.index', compact('agents'));
    }

    public function approve($id)
    {
        $agent = AgentProfile::findOrFail($id);
        $agent->update(['approval_status' => 'approved']);
        
        return redirect()->back()->with('success', 'Agent approved successfully.');
    }

    public function suspend($id)
    {
        $agent = AgentProfile::findOrFail($id);
        $agent->update(['approval_status' => 'suspended']);
        
        return redirect()->back()->with('success', 'Agent suspended successfully.');
    }
}
