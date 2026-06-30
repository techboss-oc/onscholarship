<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StudentProfile;
use App\Models\AgentProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TestAccountsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole   = Role::firstOrCreate(['name' => 'admin']);
        $agentRole   = Role::firstOrCreate(['name' => 'agent']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // ----- Super Admin -----
        $admin = User::updateOrCreate(
            ['email' => 'admin@sendus.com'],
            [
                'name'              => 'Super Admin',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );
        $admin->syncRoles($adminRole);

        // ----- Agent 1 -----
        $agent1 = User::updateOrCreate(
            ['email' => 'agent1@example.com'],
            [
                'name'              => 'Test Agent 1',
                'password'          => Hash::make('password'),
                'role'              => 'agent',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );
        $agent1->syncRoles($agentRole);
        AgentProfile::firstOrCreate(
            ['user_id' => $agent1->id],
            ['company_name' => 'Agency One', 'approval_status' => 'approved', 'approved_at' => now(), 'approved_by' => $admin->id]
        );

        // ----- Agent 2 -----
        $agent2 = User::updateOrCreate(
            ['email' => 'agent2@example.com'],
            [
                'name'              => 'Test Agent 2',
                'password'          => Hash::make('password'),
                'role'              => 'agent',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );
        $agent2->syncRoles($agentRole);
        AgentProfile::firstOrCreate(
            ['user_id' => $agent2->id],
            ['company_name' => 'Agency Two', 'approval_status' => 'approved', 'approved_at' => now(), 'approved_by' => $admin->id]
        );

        // ----- Student 1 -----
        $student = User::updateOrCreate(
            ['email' => 'student1@example.com'],
            [
                'name'              => 'Student Applicant',
                'password'          => Hash::make('password'),
                'role'              => 'student',
                'status'            => 'active',
                'email_verified_at' => now(),
            ]
        );
        $student->syncRoles($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $student->id],
            ['first_name' => 'Student', 'last_name' => 'Applicant', 'country' => 'Nigeria']
        );

        $this->command->info('Test accounts created successfully!');
        $this->command->table(
            ['Email', 'Password', 'Role'],
            [
                ['admin@sendus.com',    'password', 'admin'],
                ['agent1@example.com',  'password', 'agent'],
                ['agent2@example.com',  'password', 'agent'],
                ['student1@example.com','password', 'student'],
            ]
        );
    }
}
