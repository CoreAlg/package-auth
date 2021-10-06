<?php

namespace CoreAlg\Auth\Tests\Unit;

use CoreAlg\Auth\Mail\SendAccountVerificationLink;
use CoreAlg\Auth\Models\User;
use CoreAlg\Auth\Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class SendAccountVerificationLinkTest extends TestCase
{
    /**
     * @test
     */
    public function it_sends_an_account_activation_email()
    {
        Mail::fake();

        $user = User::create([
            'name' => 'Mizanur',
            'email' => 'mizan3008@gmail.com',
            'password' => 'secret'
        ]);

        $activation_link = route('activeAccount', 'token');

        Mail::assertNothingSent();

        Mail::to($user->email)->send(new SendAccountVerificationLink($user, $activation_link));

        Mail::assertSent(SendAccountVerificationLink::class, function ($mail) use ($user, $activation_link) {
            return $mail->activation_link === $activation_link && $mail->user->name === 'Mizanur';
        });
    }
}
