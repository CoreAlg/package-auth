<?php

use CoreAlg\Auth\Models\User;
use CoreAlg\Auth\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    function a_user_has_a_name()
    {
        $user = User::create([
            'name' => 'Mizanur',
            'email' => 'mizan3008@gmail.com',
            'password' => 'secret'
        ]);

        $this->assertEquals('Mizanur', $user->name);
    }
}
