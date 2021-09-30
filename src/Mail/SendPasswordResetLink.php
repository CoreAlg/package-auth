<?php

namespace CoreAlg\Auth\Mail;

use CoreAlg\Auth\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPasswordResetLink extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password_reset_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $password_reset_link)
    {
        $this->user = $user;
        $this->password_reset_link = $password_reset_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $blade = "emails.password-reset";

        return $this->view($blade)->subject(config('app.name') . ": Reset Password");
    }
}
