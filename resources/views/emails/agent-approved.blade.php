<x-emails.layout
    eyebrow="Agent Approved"
    title="Your agent account has been approved"
    preheader="Your Onscholarship agent approval is complete and your dashboard access is now available."
    :cta-url="route('agent.dashboard')"
    cta-label="Open Agent Dashboard"
>
    <p class="email-copy">Hello {{ $agentProfile->user?->name }},</p>

    <p class="email-copy">
        Great news. Your Onscholarship agent account has been approved successfully, and you can now access your full agent dashboard.
    </p>

    <p class="email-copy">
        You are now ready to manage students, explore programs, follow applications, and use the platform tools available to approved agents.
    </p>

    <x-slot:details>
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding: 0 0 12px; font-size: 13px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; color: #1fa463;">
                    Approval Details
                </td>
            </tr>
            <tr>
                <td style="font-size: 14px; line-height: 1.9; color: #334155;">
                    <strong>Agent Reference</strong><br>
                    {{ $agentProfile->agent_reference ?? 'On file' }}
                    <br><br>
                    <strong>Status</strong><br>
                    Approved
                    <br><br>
                    <strong>Approved On</strong><br>
                    {{ optional($agentProfile->approved_at)->format('F j, Y g:i A') ?? now()->format('F j, Y g:i A') }}
                </td>
            </tr>
        </table>
    </x-slot:details>
</x-emails.layout>
