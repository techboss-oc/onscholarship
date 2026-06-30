<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StudentProfile;
use App\Models\AgentProfile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $agentRole = Role::firstOrCreate(['name' => 'agent']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Create Permissions
        // Admin permissions
        $permissions = [
            'manage users',
            'manage universities',
            'manage programs',
            'manage scholarships',
            'manage applications',
            'manage blog',
            'manage settings',
            
            // Agent permissions
            'manage students',
            'submit applications',
            
            // Student permissions
            'apply to university',
            'upload documents',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole->givePermissionTo(Permission::all());
        
        $agentRole->givePermissionTo([
            'manage students',
            'submit applications',
            'upload documents',
        ]);
        
        $studentRole->givePermissionTo([
            'apply to university',
            'upload documents',
        ]);

        // TEST ACCOUNTS

        // 1. Admin Account
        $admin = User::firstOrCreate(
            ['email' => 'admin@senduseducation.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole($adminRole);

        // 2. Agent Account
        $agent = User::firstOrCreate(
            ['email' => 'agent@senduseducation.com'],
            [
                'name' => 'Test Agent',
                'password' => Hash::make('Agent@12345'),
                'role' => 'agent',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );
        $agent->assignRole($agentRole);
        
        AgentProfile::firstOrCreate(
            ['user_id' => $agent->id],
            [
                'company_name' => 'Global Education Agency',
                'approval_status' => 'approved',
                'approved_at' => now(),
                'approved_by' => $admin->id,
            ]
        );

        // 3. Student Account
        $student = User::firstOrCreate(
            ['email' => 'student@senduseducation.com'],
            [
                'name' => 'Test Student',
                'password' => Hash::make('Student@12345'),
                'role' => 'student',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );
        $student->assignRole($studentRole);
        
        StudentProfile::firstOrCreate(
            ['user_id' => $student->id],
            [
                'first_name' => 'Test',
                'last_name' => 'Student',
                'country' => 'Nigeria',
            ]
        );

        // Call other seeders
        $this->call([
            UniversitySeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
