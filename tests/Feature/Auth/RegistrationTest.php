<?php

namespace Tests\Feature\Auth;

use App\Mail\AgentApprovedMail;
use App\Mail\AgentPendingApprovalMail;
use App\Mail\StudentWelcomeMail;
use App\Models\AgentProfile;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        Role::create(['name' => 'student', 'guard_name' => 'web']);
        Mail::fake();

        $response = $this->post('/register', [
            'name' => 'Test Student User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'student',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
        $response->assertSessionHas('success');
        $response->assertSessionHas('registration_success_popup');

        $user = User::where('email', 'test@example.com')->firstOrFail();

        $this->assertTrue($user->hasRole('student'));
        $this->assertDatabaseHas('student_profiles', [
            'user_id' => $user->id,
            'first_name' => 'Test',
            'middle_name' => 'Student',
            'last_name' => 'User',
        ]);
        $this->assertInstanceOf(StudentProfile::class, $user->studentProfile);
        Mail::assertSent(StudentWelcomeMail::class, fn (StudentWelcomeMail $mail) => $mail->user->is($user));
        Mail::assertNotSent(AgentPendingApprovalMail::class);
    }

    public function test_new_agents_receive_pending_approval_email(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        Role::create(['name' => 'agent', 'guard_name' => 'web']);
        Mail::fake();

        $response = $this->post('/register', [
            'name' => 'Bright Path Agency',
            'email' => 'agent@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'agent',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));

        $user = User::where('email', 'agent@example.com')->firstOrFail();

        $this->assertTrue($user->hasRole('agent'));
        $this->assertDatabaseHas('agent_profiles', [
            'user_id' => $user->id,
            'approval_status' => 'pending',
        ]);
        Mail::assertSent(AgentPendingApprovalMail::class, fn (AgentPendingApprovalMail $mail) => $mail->user->is($user));
        Mail::assertNotSent(StudentWelcomeMail::class);
    }

    public function test_approving_an_agent_sends_the_approval_email(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'agent', 'guard_name' => 'web']);
        Mail::fake();

        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $agentUser = User::factory()->create();
        $agentUser->assignRole('agent');

        $agentProfile = AgentProfile::create([
            'user_id' => $agentUser->id,
            'agent_reference' => 'OS-ABC123',
            'company_name' => 'Bright Path Agency',
            'approval_status' => 'pending',
        ]);

        $response = $this
            ->actingAs($admin)
            ->post(route('admin.agents.approve', $agentProfile->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Agent approved successfully.');

        $this->assertDatabaseHas('agent_profiles', [
            'id' => $agentProfile->id,
            'approval_status' => 'approved',
            'approved_by' => $admin->id,
        ]);
        Mail::assertSent(AgentApprovedMail::class, fn (AgentApprovedMail $mail) => $mail->agentProfile->is($agentProfile->fresh()));
    }
}
