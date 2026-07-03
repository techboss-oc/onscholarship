<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\University;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('university')->paginate(20);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $universities = University::where('is_active', true)->get();
        return view('admin.programs.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'university_id'  => 'required|exists:universities,id',
            'name'           => 'required|string|max:255',
            'degree_level'   => 'required|in:bachelor,master,phd,non-degree',
            'duration_years' => 'required|numeric|min:0.5|max:10',
            'tuition_fee'    => 'required|numeric|min:0',
            'service_charge_usd' => 'required|numeric|min:0',
        ]);

        Program::create([
            'university_id'  => $request->university_id,
            'name'           => $request->name,
            'degree_level'   => $request->degree_level,
            'duration_years' => $request->duration_years,
            'tuition_fee_usd' => $request->tuition_fee,
            'service_charge_usd' => $request->service_charge_usd,
            'description'    => $request->description,
            'is_active'      => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $universities = University::where('is_active', true)->get();
        return view('admin.programs.edit', compact('program', 'universities'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'university_id'  => 'required|exists:universities,id',
            'name'           => 'required|string|max:255',
            'degree_level'   => 'required|in:bachelor,master,phd,non-degree',
            'duration_years' => 'required|numeric|min:0.5|max:10',
            'tuition_fee'    => 'required|numeric|min:0',
            'service_charge_usd' => 'required|numeric|min:0',
        ]);

        $program->update([
            'university_id'  => $request->university_id,
            'name'           => $request->name,
            'degree_level'   => $request->degree_level,
            'duration_years' => $request->duration_years,
            'tuition_fee_usd' => $request->tuition_fee,
            'service_charge_usd' => $request->service_charge_usd,
            'description'    => $request->description,
            'is_active'      => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
        Program::findOrFail($id)->delete();
        return back()->with('success', 'Program deleted successfully.');
    }
}
