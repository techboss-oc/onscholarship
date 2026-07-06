<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $validated = $request->validate($this->rules(), [], $this->validationAttributes());

        Program::create($this->programPayload($validated, $request));

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

        $validated = $request->validate($this->rules(), [], $this->validationAttributes());

        $program->update($this->programPayload($validated, $request, $program));

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
        Program::findOrFail($id)->delete();
        return back()->with('success', 'Program deleted successfully.');
    }

    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug !== '' ? $baseSlug : 'program';
        $originalSlug = $slug;
        $counter = 2;

        while (Program::withTrashed()
            ->where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function rules(): array
    {
        return [
            'university_id' => 'required|exists:universities,id',
            'name' => 'required|string|max:255',
            'degree_level' => 'required|in:foundation,diploma,bachelor,master,phd',
            'field_of_study' => 'required|string|max:255',
            'duration_years' => 'required|integer|min:1|max:10',
            'tuition_fee' => 'required|numeric|min:0',
            'service_charge_usd' => 'required|numeric|min:0',
            'description' => 'required|string',
            'language' => 'nullable|string|max:255',
            'intake_months' => 'nullable|string|max:255',
            'requirements' => 'nullable|string',
            'career_prospects' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ];
    }

    private function programPayload(array $validated, Request $request, ?Program $program = null): array
    {
        $name = $validated['name'];

        return [
            'university_id' => $validated['university_id'],
            'name' => $name,
            'slug' => $program === null || $name !== $program->name || empty($program->slug)
                ? $this->generateUniqueSlug($name, $program?->id)
                : $program->slug,
            'degree_level' => $validated['degree_level'],
            'field_of_study' => $validated['field_of_study'],
            'description' => $validated['description'],
            'duration_years' => $validated['duration_years'],
            'tuition_fee_usd' => $validated['tuition_fee'],
            'service_charge_usd' => $validated['service_charge_usd'],
            'language' => $validated['language'] ?? 'English',
            'intake_months' => $validated['intake_months'] ?? null,
            'requirements' => $validated['requirements'] ?? null,
            'career_prospects' => $validated['career_prospects'] ?? null,
            'is_active' => $program === null
                ? $request->boolean('is_active', true)
                : $request->boolean('is_active'),
            'is_featured' => $request->boolean('is_featured'),
        ];
    }

    private function validationAttributes(): array
    {
        return [
            'university_id' => 'university',
            'name' => 'program name',
            'degree_level' => 'degree level',
            'field_of_study' => 'field of study',
            'duration_years' => 'duration',
            'tuition_fee' => 'tuition fee',
            'service_charge_usd' => 'service charge',
            'description' => 'program description',
            'language' => 'language of instruction',
            'intake_months' => 'intake months',
            'requirements' => 'admission requirements',
            'career_prospects' => 'career prospects',
        ];
    }
}
