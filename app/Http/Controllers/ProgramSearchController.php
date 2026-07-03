<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Setting;
use App\Models\University;
use Illuminate\Http\Request;

class ProgramSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::with('university')->active();

        // Keyword Search
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhereHas('university', function($uq) use ($keyword) {
                      $uq->where('name', 'like', "%{$keyword}%");
                  });
            });
        }

        // Filters (Simplified mapped combinations based on reference)
        if ($request->filled('degree_level')) {
            $query->where('degree_level', $request->degree_level);
        }
        
        if ($request->filled('language')) {
            $query->where('language', $request->language);
        }

        if ($request->filled('duration')) {
            $query->where('duration_years', $request->duration);
        }

        if ($request->filled('min_price')) {
            $query->where('tuition_fee_usd', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('tuition_fee_usd', '<=', $request->max_price);
        }
        
        $programs = $query->latest()->paginate(10)->withQueryString();
        
        // Pass distinct options for selects (In real production we would pull from constants or distinct DB columns)
        $degreeTypes = Program::select('degree_level')->distinct()->pluck('degree_level');
        $languages = Program::select('language')->distinct()->pluck('language');

        $viewPrefix = auth()->user()->hasRole('agent') ? 'agent.' : 'student.';
        
        $layoutName = auth()->user()->hasRole('agent') ? 'layouts.agent' : 'layouts.student';
        $applicationFee = [
            'amount' => (float) Setting::get('application_fee_amount', 120),
            'currency' => strtoupper((string) Setting::get('application_fee_currency', 'USD')),
        ];

        return view('shared.programs-search', compact('programs', 'degreeTypes', 'languages', 'layoutName', 'applicationFee'));
    }
}
