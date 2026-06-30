<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AgentPendingApprovalMail;
use App\Mail\StudentWelcomeMail;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\AgentProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:student,agent'],
        ]);

        [$firstName, $middleName, $lastName] = $this->splitName($validated['name']);

        $user = DB::transaction(function () use ($validated, $firstName, $middleName, $lastName) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Assign Spatie Role
            $user->assignRole($validated['role']);

            // Create Profile based on role
            if ($validated['role'] === 'student') {
                StudentProfile::create([
                    'user_id' => $user->id,
                    'first_name' => $firstName,
                    'middle_name' => $middleName,
                    'last_name' => $lastName,
                ]);
            } elseif ($validated['role'] === 'agent') {
                AgentProfile::create([
                    'user_id' => $user->id,
                    'agent_reference' => 'OS-' . strtoupper(Str::random(6)),
                    'company_name' => $validated['name'] . ' Agency',
                    'approval_status' => 'pending', // Agents need approval
                ]);
            }

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);
        $user->loadMissing('studentProfile', 'agentProfile');

        try {
            if ($validated['role'] === 'student') {
                Mail::to($user->email)->send(new StudentWelcomeMail($user));
            } elseif ($validated['role'] === 'agent') {
                Mail::to($user->email)->send(new AgentPendingApprovalMail($user));
            }
        } catch (\Throwable $exception) {
            report($exception);
        }

        $redirect = redirect(route('dashboard', absolute: false));

        if ($validated['role'] === 'student') {
            return $redirect
                ->with('success', 'Your student account has been created successfully. Welcome to your dashboard.')
                ->with('registration_success_popup', [
                    'title' => 'Account Created Successfully',
                    'message' => 'Welcome to Onscholarship. Your student dashboard is ready and you can now start exploring programs, scholarships, and applications.',
                ]);
        }

        return $redirect;
    }

    /**
     * Split a full name into student profile fields.
     *
     * @return array{0: string, 1: ?string, 2: string}
     */
    private function splitName(string $name): array
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];

        $firstName = array_shift($parts) ?? $name;
        $lastName = count($parts) > 0 ? array_pop($parts) : $firstName;
        $middleName = count($parts) > 0 ? implode(' ', $parts) : null;

        return [$firstName, $middleName, $lastName];
    }
}
