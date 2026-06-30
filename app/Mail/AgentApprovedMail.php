<?php

namespace App\Mail;

use App\Models\AgentProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AgentApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public AgentProfile $agentProfile)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Onscholarship Agent Account Has Been Approved',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.agent-approved',
            with: [
                'agentProfile' => $this->agentProfile,
            ],
        );
    }
}
