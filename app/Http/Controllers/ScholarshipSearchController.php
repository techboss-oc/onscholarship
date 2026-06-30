<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\University;
use Illuminate\Http\Request;

class ScholarshipSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Scholarship::with('university')->active();

        if ($request->filled('keyword')) {
            $kw = $request->keyword;
            $query->where(function ($q) use ($kw) {
                $q->where('name', 'like', "%{$kw}%")
                  ->orWhere('description', 'like', "%{$kw}%")
                  ->orWhereHas('university', fn($u) => $u->where('name', 'like', "%{$kw}%"));
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('university_id')) {
            $query->where('university_id', $request->university_id);
        }

        if ($request->filled('coverage')) {
            $query->where('coverage', 'like', '%' . $request->coverage . '%');
        }

        $perPage = in_array($request->per_page, [10, 25, 50]) ? $request->per_page : 10;

        $scholarships = $query->orderBy('deadline')->paginate($perPage)->withQueryString();
        $universities = University::where('is_active', true)->orderBy('name')->get(['id', 'name']);
        $types        = Scholarship::select('type')->distinct()->pluck('type')->filter();

        $layoutName = auth()->user()->hasRole('agent') ? 'layouts.agent' : 'layouts.student';

        return view('shared.scholarships', compact('scholarships', 'universities', 'types', 'perPage', 'layoutName'));
    }
}
