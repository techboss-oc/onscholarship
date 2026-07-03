<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::withCount('programs')->paginate(15);
        return view('admin.universities.index', compact('universities'));
    }

    public function create()
    {
        return view('admin.universities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'city'     => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'type'     => 'required|in:public,private',
            'logo' => 'nullable|image|max:5120',
            'cover_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->except('logo', 'cover_image');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('universities/logos', 'public');
        }
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('universities/covers', 'public');
        }

        University::create($data);
        return redirect()->route('admin.universities.index')->with('success', 'University created successfully.');
    }

    public function edit($id)
    {
        $university = University::findOrFail($id);
        return view('admin.universities.edit', compact('university'));
    }

    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);
        $request->validate([
            'name'     => 'required|string|max:255',
            'city'     => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'type'     => 'required|in:public,private',
            'logo' => 'nullable|image|max:5120',
            'cover_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->except('logo', 'cover_image', '_method');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($university->logo) Storage::disk('public')->delete($university->logo);
            $data['logo'] = $request->file('logo')->store('universities/logos', 'public');
        }
        if ($request->hasFile('cover_image')) {
            if ($university->cover_image) Storage::disk('public')->delete($university->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('universities/covers', 'public');
        }
        $university->update($data);
        return redirect()->route('admin.universities.index')->with('success', 'University updated successfully.');
    }

    public function destroy($id)
    {
        University::findOrFail($id)->delete();
        return back()->with('success', 'University deleted.');
    }
}
