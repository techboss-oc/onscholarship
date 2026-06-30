<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentProfile::with(['user', 'agent'])->latest()->paginate(20);
        return view('admin.students.index', compact('students'));
    }

    public function show($id)
    {
        $student = StudentProfile::with(['user', 'agent', 'applications.program', 'documents'])->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }
    
    // For now, no direct edit/delete from admin, just view
}
