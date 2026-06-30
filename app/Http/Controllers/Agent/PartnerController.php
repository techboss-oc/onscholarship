<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function subAgencies()
    {
        $agentProfile = auth()->user()->agentProfile;
        // Logic for sub-agencies (if implemented in future)
        return view('agent.sub-agencies', compact('agentProfile'));
    }

    public function commissions()
    {
        $agentProfile = auth()->user()->agentProfile;
        // Logic for commissions (if implemented in future)
        return view('agent.commissions', compact('agentProfile'));
    }
}
