<?php

namespace App\Http\Controllers;

use App\Models\AgentProfile;
use App\Models\ContactRequest;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = StudentProfile::count();
        $totalAgents = AgentProfile::count();
        $pendingAgents = AgentProfile::where('approval_status', 'pending')->count();
        $newContactMessages = ContactRequest::where('status', 'new')->count();
        $recentContactRequests = ContactRequest::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalAgents',
            'pendingAgents',
            'newContactMessages',
            'recentContactRequests'
        ));
    }
}
