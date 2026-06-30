<x-emails.layout
    eyebrow="Student Welcome"
    title="Welcome to your Onscholarship journey"
    preheader="Your student account is ready and your dashboard is waiting."
    :cta-url="route('dashboard')"
    cta-label="Open Student Dashboard"
>
    <p class="email-copy">Hello {{ $user->name }},</p>

    <p class="email-copy">
        Your student account has been created successfully. Welcome to Onscholarship, where we help you discover scholarships, explore programs, and move forward with your study goals in China.
    </p>

    <p class="email-copy">
        You can now sign in to your dashboard to complete your profile, review opportunities, and begin your application process with confidence.
    </p>

    <x-slot:details>
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding: 0 0 12px; font-size: 13px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; color: #1fa463;">
                    What you can do next
                </td>
            </tr>
            <tr>
                <td style="font-size: 14px; line-height: 1.9; color: #334155;">
                    <strong>Complete your profile</strong><br>
                    Add your personal information and required details for a smoother application process.
                    <br><br>
                    <strong>Explore programs and scholarships</strong><br>
                    Review available universities, funding options, and admission opportunities.
                    <br><br>
                    <strong>Start your applications</strong><br>
                    Use your dashboard to track progress and stay updated on every step.
                </td>
            </tr>
        </table>
    </x-slot:details>
</x-emails.layout>
