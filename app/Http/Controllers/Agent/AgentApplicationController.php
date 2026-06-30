<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AgentApplicationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $applications = $user->agentApplications()
            ->with(['student.user', 'program.university'])
            ->latest()
            ->paginate(15);
            
        return view('agent.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $user = auth()->user();
        
        $application = $user->agentApplications()
            ->with(['student.user', 'program.university', 'documents'])
            ->findOrFail($id);
            
        return view('agent.applications.show', compact('application'));
    }
}
