<?php

namespace CoreAlg\Auth\Listeners;

use CoreAlg\Auth\Events\NewAccountCreated;
use CoreAlg\Auth\Interfaces\HashManagerInterface;
use CoreAlg\Auth\Mail\SendAccountVerificationLink;
use Illuminate\Support\Facades\Mail;

class SendAccountVerificationEmail
{
    private $hashManager;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(HashManagerInterface $hashManager)
    {
        $this->hashManager = $hashManager;
    }

    /**
     * Handle the event.
     *
     * @param  NewAccountCreated  $event
     * @return void
     */
    public function handle(NewAccountCreated $event)
    {
        $user = $event->user;

        $token = $this->hashManager->encrypt($user->id);

        $activation_link = route('activeAccount', $token);

        Mail::to($user)->send(new SendAccountVerificationLink($user, $activation_link));
    }
}
