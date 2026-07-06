<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::paginate(15);
        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        $universities = University::where('is_active', true)->get();

        return view('admin.scholarships.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), [], $this->validationAttributes());

        Scholarship::create($this->scholarshipPayload($validated, $request));
        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship created successfully.');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $universities = University::where('is_active', true)->get();

        return view('admin.scholarships.edit', compact('scholarship', 'universities'));
    }

    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $validated = $request->validate($this->rules(), [], $this->validationAttributes());

        $scholarship->update($this->scholarshipPayload($validated, $request, $scholarship));
        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship updated.');
    }

    public function destroy($id)
    {
        Scholarship::findOrFail($id)->delete();
        return back()->with('success', 'Scholarship deleted.');
    }

    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'university_id' => 'nullable|exists:universities,id',
            'type' => 'required|in:government,university,private,csc',
            'description' => 'required|string',
            'eligibility' => 'required|string',
            'coverage' => 'required|string|max:255',
            'amount_usd' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
            'intake_date' => 'nullable|date',
            'available_slots' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ];
    }

    private function scholarshipPayload(array $validated, Request $request, ?Scholarship $scholarship = null): array
    {
        $name = $validated['name'];

        return [
            'name' => $name,
            'slug' => $scholarship === null || $name !== $scholarship->name || empty($scholarship->slug)
                ? $this->generateUniqueSlug($name, $scholarship?->id)
                : $scholarship->slug,
            'university_id' => $validated['university_id'] ?? null,
            'type' => $validated['type'],
            'description' => $validated['description'],
            'eligibility' => $validated['eligibility'],
            'coverage' => $validated['coverage'],
            'amount_usd' => $validated['amount_usd'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'deadline' => $validated['deadline'] ?? null,
            'intake_date' => $validated['intake_date'] ?? null,
            'available_slots' => $validated['available_slots'] ?? null,
            'is_active' => $scholarship === null
                ? $request->boolean('is_active', true)
                : $request->boolean('is_active'),
            'is_featured' => $request->boolean('is_featured'),
        ];
    }

    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug !== '' ? $baseSlug : 'scholarship';
        $originalSlug = $slug;
        $counter = 2;

        while (Scholarship::withTrashed()
            ->where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function validationAttributes(): array
    {
        return [
            'name' => 'scholarship name',
            'university_id' => 'university',
            'type' => 'scholarship type',
            'description' => 'scholarship description',
            'eligibility' => 'eligibility',
            'coverage' => 'coverage',
            'amount_usd' => 'amount',
            'duration' => 'duration',
            'deadline' => 'deadline',
            'intake_date' => 'intake date',
            'available_slots' => 'available slots',
        ];
    }
}
