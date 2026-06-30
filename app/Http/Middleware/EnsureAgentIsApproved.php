<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAgentIsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // If the user has an agent profile and it is not approved, redirect
        if ($user && $user->hasRole('agent')) {
            $profile = $user->agentProfile;
            
            if (!$profile || $profile->approval_status !== 'approved') {
                return redirect()->route('agent.pending');
            }
        }

        return $next($request);
    }
}
