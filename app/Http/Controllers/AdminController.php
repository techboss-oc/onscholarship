<?php

namespace App\Http\Controllers;

use App\Models\AgentProfile;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = StudentProfile::count();
        $totalAgents = AgentProfile::count();
        $pendingAgents = AgentProfile::where('approval_status', 'pending')->count();
        
        return view('admin.dashboard', compact('totalStudents', 'totalAgents', 'pendingAgents'));
    }
}
