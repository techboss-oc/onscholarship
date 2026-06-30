<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::paginate(15);
        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('admin.scholarships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'funding_type' => 'required|string',
            'degree_type'  => 'required|string',
            'deadline'     => 'required|date',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->boolean('is_active', true);
        Scholarship::create($data);
        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship created successfully.');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $data = $request->except('_method');
        $data['is_active'] = $request->boolean('is_active');
        $scholarship->update($data);
        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship updated.');
    }

    public function destroy($id)
    {
        Scholarship::findOrFail($id)->delete();
        return back()->with('success', 'Scholarship deleted.');
    }
}
