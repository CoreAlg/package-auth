<?php

namespace CoreAlg\Auth\Mail;

use CoreAlg\Auth\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAccountVerificationLink extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $activation_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $activation_link)
    {
        $this->user = $user;
        $this->activation_link = $activation_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $blade = "vendor.core-auth." . config('core-auth.view-template') . ".emails.account-verification";
        return $this->view($blade)->subject(config('app.name') . ": Active Account");
    }
}
