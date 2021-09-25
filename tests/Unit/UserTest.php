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
        $user = User::factory()->create(['name' => 'Fake Name']);
        $this->assertEquals('Fake Name', $user->name);
    }
}
