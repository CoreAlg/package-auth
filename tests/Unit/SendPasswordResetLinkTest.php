<?php

namespace CoreAlg\Auth\Tests\Unit;

use CoreAlg\Auth\Mail\SendPasswordResetLink;
use CoreAlg\Auth\Models\User;
use CoreAlg\Auth\Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetLinkTest extends TestCase
{
    /**
     * @test
     */
    public function it_sends_an_password_reset_instruction_email()
    {
        Mail::fake();

        $user = User::create([
            'first_name' => 'Mizanur',
            'last_name' => 'Rahman',
            'email' => 'mizan3008@gmail.com',
            'password' => 'secret'
        ]);

        $password_reset_link = route('password.reset', 'token');

        Mail::assertNothingSent();

        Mail::to($user->email)->send(new SendPasswordResetLink($user, $password_reset_link));

        Mail::assertSent(SendPasswordResetLink::class, function ($mail) use ($user, $password_reset_link) {
            return $mail->password_reset_link === $password_reset_link && $mail->user->first_name === 'Mizanur' && $mail->user->last_name === 'Rahman';
        });
    }
}
