<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Document;
use App\Models\Program;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $profile = $user->studentProfile;
        $applications = Application::where('user_id', $user->id)->with('program.university')->latest()->take(5)->get();
        $documents = Document::where('user_id', $user->id)->latest()->get();
        return view('student.dashboard', compact('profile', 'applications', 'documents'));
    }

    public function profile()
    {
        $profile = auth()->user()->studentProfile;
        return view('student.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'nullable|date',
            'gender'        => 'nullable|in:male,female,other',
            'nationality'   => 'nullable|string|max:100',
            'phone'         => 'nullable|string|max:30',
            'address'       => 'nullable|string|max:500',
            'passport_number' => 'nullable|string|max:50',
        ]);

        auth()->user()->studentProfile->update($request->only([
            'date_of_birth','gender','nationality','phone','address','passport_number'
        ]));

        return back()->with('success', 'Profile updated successfully.');
    }

    public function documents()
    {
        $documents = Document::where('user_id', auth()->id())->latest()->get();
        return view('student.documents', compact('documents'));
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document_type' => 'required|string|max:100',
            'file'          => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $path = $request->file('file')->store('documents/' . auth()->id(), 'private');

        $doc = Document::create([
            'user_id'       => auth()->id(),
            'document_type' => $request->document_type,
            'file_path'     => $path,
            'name'          => $request->file('file')->getClientOriginalName(),
            'status'        => 'pending',
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['status' => 'success', 'document' => $doc]);
        }

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function applications()
    {
        $applications = Application::where('user_id', auth()->id())
            ->with('program.university')
            ->latest()
            ->paginate(10);
        return view('student.applications.index', compact('applications'));
    }

    public function createApplication(Request $request)
    {
        $user = auth()->user();
        if (!$user->isProfileComplete()) {
            return redirect()->route('student.onboarding')
                ->with('warning', 'Please complete your profile before applying.');
        }

        $selectedProgramId = $request->query('program_id');
        $universities = University::where('is_active', true)->with('programs')->get();
        return view('student.applications.create', compact('universities', 'selectedProgramId'));
    }

    public function showOnboarding()
    {
        $user = auth()->user();
        $profile = $user->studentProfile;
        $documents = $user->documents;
        return view('student.onboarding', compact('user', 'profile', 'documents'));
    }

    public function saveOnboarding(Request $request)
    {
        // Handling multi-step save logic here
        // For simplicity in a single controller call, we can check the step provided
        $step = $request->input('step');
        $user = auth()->user();

        if ($step == 1) {
             $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
             ]);
             $user->studentProfile->update($request->only('first_name', 'last_name'));
        } elseif ($step == 2) {
            $request->validate([
                'gender' => 'required|in:male,female',
                'nationality' => 'required|string',
                'date_of_birth' => 'required|date',
                'passport_number' => 'required|string',
                'passport_expiry' => 'required|date',
                'address' => 'required|string',
            ]);
            $user->studentProfile->update($request->except('_token', 'step'));
        } elseif ($step == 3) {
            // Handled by uploadDocument usually, but we can allow a final check or redirect
            if ($user->isProfileComplete()) {
                return response()->json(['status' => 'success', 'message' => 'Profile completed!']);
            }
            return response()->json(['status' => 'error', 'message' => 'Missing documents.']);
        }

        return response()->json(['status' => 'success']);
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'program_id'      => 'required|exists:programs,id',
            'intake_year'     => 'required|digits:4|integer|min:2024',
            'intake_semester' => 'required|in:spring,fall',
            'cover_letter'    => 'nullable|string|max:2000',
        ]);

        Application::create([
            'user_id'         => auth()->id(),
            'program_id'      => $request->program_id,
            'intake_year'     => $request->intake_year,
            'intake_semester' => $request->intake_semester,
            'cover_letter'    => $request->cover_letter,
            'status'          => 'draft',
        ]);

        return redirect()->route('student.applications.index')->with('success', 'Application submitted successfully!');
    }
}
