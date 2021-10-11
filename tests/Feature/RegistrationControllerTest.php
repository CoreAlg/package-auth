<?php

namespace Corealg\Auth\Tests;

use CoreAlg\Auth\Events\NewAccountCreated;
use CoreAlg\Auth\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use CoreAlg\Auth\Tests\TestCase;
use Illuminate\Support\Facades\Event;

class RegistrationControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        Event::fake();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    function an_event_is_emitted_when_a_new_user_is_registered()
    {
        $this->post(route('register.store'), [
            'first_name' => 'Mizanur',
            'last_name' => 'Rahman',
            'gender' => 'male',
            'email' => 'mizan3008@gmail',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agree_terms' => 1,
        ]);

        $user = User::first();

        Event::assertDispatched(NewAccountCreated::class, function ($event) use ($user) {
            return $event->user->id === $user->id;
        });
    }

    /**
     * @test
     */
    public function user_can_register_through_the_form()
    {
        $this->assertCount(0, User::all());

        $response = $this->post(route('register.store'), [
            'first_name' => 'Mizanur',
            'last_name' => 'Rahman',
            'gender' => 'male',
            'email' => 'mizan3008@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agree_terms' => 1,
        ]);

        // $response->assertOk();
        $this->assertCount(1, User::all());
    }

    /**
     * @test
     */
    public function first_name_is_required_to_register_through_the_form()
    {
        $response = $this->post(route('register.store'), [
            'email' => 'mizan3008@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agree_terms' => 1,
        ]);

        $response->assertSessionHasErrors(['first_name']);
        $this->assertCount(0, User::all());
    }

    /**
     * @test
     */
    public function email_is_required_to_register_through_the_form()
    {
        $response = $this->post(route('register.store'), [
            'first_name' => 'Mizanur',
            'last_name' => 'Rahman',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agree_terms' => 1,
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertCount(0, User::all());
    }
}
