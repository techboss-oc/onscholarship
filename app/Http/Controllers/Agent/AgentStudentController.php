<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\StudentProfile;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AgentStudentController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $agentProfile = $user->agentProfile;
        
        // Stats
        $myStudentsCount = $user->agentStudents()->count();
        $recentStudents  = $user->agentStudents()->with('user')->latest()->take(5)->get();

        // Analytics (Askuni Style)
        $apps = $user->agentApplications;
        $stats = [
            'total_apps' => $apps->count(),
            'offers_sent' => $apps->where('status', 'offer_letter_issued')->count(),
            'accepted' => $apps->where('status', 'accepted')->count(),
            'registered' => $apps->where('status', 'completed')->count(),
        ];

        // Placeholder for Commissions
        $commissions = [
            'potential' => 0.00,
            'earned' => 0.00,
            'withdrawn' => 0.00,
        ];

        // Announcements
        $announcements = Announcement::whereIn('target_role', ['all', 'agent'])
            ->latest('published_at')
            ->take(5)
            ->get();

        // Performance Chart Mock (Last 7 days)
        $chartData = $this->getChartData($user);

        return view('agent.dashboard', compact(
            'agentProfile', 
            'myStudentsCount', 
            'recentStudents', 
            'stats', 
            'commissions', 
            'announcements',
            'chartData'
        ));
    }

    private function getChartData($user)
    {
        $dates = [];
        $appCounts = [];
        $acceptCounts = [];
        $regCounts = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;
            
            $appCounts[] = Application::where('agent_id', $user->id)
                ->whereDate('created_at', $date)->count();
            
            $acceptCounts[] = Application::where('agent_id', $user->id)
                ->where('status', 'accepted')
                ->whereDate('updated_at', $date)->count();

            $regCounts[] = Application::where('agent_id', $user->id)
                ->where('status', 'completed')
                ->whereDate('updated_at', $date)->count();
        }

        return [
            'labels' => $dates,
            'apps' => $appCounts,
            'acceptance' => $acceptCounts,
            'registered' => $regCounts,
        ];
    }

    public function index()
    {
        $user = auth()->user();
        $agentProfile = $user->agentProfile;
        $students = $user->agentStudents()
                    ->with('user')->paginate(15);
        return view('agent.students', compact('students', 'agentProfile'));
    }

    public function profile()
    {
        $agentProfile = auth()->user()->agentProfile;
        return view('agent.profile', compact('agentProfile'));
    }

    public function addStudent()
    {
        return view('agent.students.add');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
        ]);

        $user->assignRole('student');

        StudentProfile::create([
            'user_id' => $user->id,
            'agent_id' => auth()->id(),
        ]);

        return redirect()->route('agent.students.index')->with('success', 'Student added successfully.');
    }

    public function invitations()
    {
        $agentProfile = auth()->user()->agentProfile;
        return view('agent.invitations', compact('agentProfile'));
    }
}
