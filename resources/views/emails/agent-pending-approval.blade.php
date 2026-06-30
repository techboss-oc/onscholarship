<x-emails.layout
    eyebrow="Agent Registration"
    title="Your agent account is pending approval"
    preheader="We received your registration and your account is now under review."
    :cta-url="route('agent.pending')"
    cta-label="View Account Status"
>
    <p class="email-copy">Hello {{ $user->name }},</p>

    <p class="email-copy">
        Thank you for registering as an agent on Onscholarship. Your application has been received successfully and is now under review by our administration team.
    </p>

    <p class="email-copy">
        We will review your account details and notify you as soon as approval is completed. Once approved, you will gain full access to your agent dashboard and tools.
    </p>

    <x-slot:details>
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding: 0 0 12px; font-size: 13px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; color: #1fa463;">
                    Review Summary
                </td>
            </tr>
            <tr>
                <td style="font-size: 14px; line-height: 1.9; color: #334155;">
                    <strong>Agent Reference</strong><br>
                    {{ $user->agentProfile?->agent_reference ?? 'Pending assignment' }}
                    <br><br>
                    <strong>Current Status</strong><br>
                    Pending approval
                    <br><br>
                    <strong>Next Update</strong><br>
                    You will receive a follow-up email immediately after your account is approved.
                </td>
            </tr>
        </table>
    </x-slot:details>
</x-emails.layout>
