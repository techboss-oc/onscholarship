<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ManagerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AgentManagerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $agentProfile = $user->agentProfile;
        $managers = $user->agentManagers()->with('user')->paginate(15);
        
        return view('agent.managers.index', compact('managers', 'agentProfile'));
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
            'permissions' => 'nullable|array',
        ]);

        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make('password123'), // Default password or generate random
                'role' => 'agent_manager',
                'phone' => $request->mobile_phone,
                'country' => $request->country,
                'status' => 'active',
            ]);

            $user->assignRole('agent_manager');

            ManagerProfile::create([
                'user_id' => $user->id,
                'agent_id' => auth()->id(),
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_phone' => $request->mobile_phone,
                'gender' => $request->gender,
                'country' => $request->country,
                'permissions_matrix' => $request->permissions,
            ]);

            // Sync Spatie Permissions
            if ($request->has('permissions')) {
                $this->syncManagerPermissions($user, $request->permissions);
            }

            return redirect()->route('agent.managers.index')->with('success', 'Manager created successfully.');
        });
    }

    private function syncManagerPermissions($user, $matrix)
    {
        $permissionsToAssign = [];
        
        foreach ($matrix as $module => $actions) {
            foreach ($actions as $action => $value) {
                if ($value) {
                    $permissionName = "{$module}.{$action}";
                    // Ensure permission exists
                    Permission::firstOrCreate(['name' => $permissionName]);
                    $permissionsToAssign[] = $permissionName;
                }
            }
        }

        $user->syncPermissions($permissionsToAssign);
    }
}
