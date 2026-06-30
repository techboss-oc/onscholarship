<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AgencyUserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AgencyUserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $agentProfile = $user->agentProfile;
        $agencyUsers = $user->agentAgencyUsers()->with('user')->paginate(15);
        
        return view('agent.agency.index', compact('agencyUsers', 'agentProfile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'title' => 'nullable|string',
            'gender' => 'nullable|string',
            'country' => 'nullable|string',
            'mobile_phone' => 'nullable|string',
            'agency_name' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make('password123'), // Default password
                'role' => 'agency_user',
                'phone' => $request->mobile_phone,
                'country' => $request->country,
                'status' => 'active',
            ]);

            // Assign role
            $user->assignRole('agency_user');

            AgencyUserProfile::create([
                'user_id' => $user->id,
                'agent_id' => auth()->id(),
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_phone' => $request->mobile_phone,
                'gender' => $request->gender,
                'country' => $request->country,
                'agency_name' => $request->agency_name,
                'permissions_matrix' => $request->permissions,
            ]);

            // Sync Permissions
            if ($request->has('permissions')) {
                $this->syncAgencyUserPermissions($user, $request->permissions);
            }

            return redirect()->route('agent.agency.index')->with('success', 'Agency User created successfully.');
        });
    }

    private function syncAgencyUserPermissions($user, $matrix)
    {
        $permissionsToAssign = [];
        
        foreach ($matrix as $module => $actions) {
            foreach ($actions as $action => $value) {
                if ($value) {
                    $permissionName = "{$module}.{$action}";
                    Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
                    $permissionsToAssign[] = $permissionName;
                }
            }
        }

        $user->syncPermissions($permissionsToAssign);
    }
}
