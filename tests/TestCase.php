<?php

namespace CoreAlg\Auth\Tests;

use CoreAlg\Auth\Providers\CoreAuthServiceProvider;
use CreatePasswordResetsTable;
use CreatePersonalAccessTokensTable;
use Illuminate\Support\Facades\Log;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            CoreAuthServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/../src/database/migrations/2014_10_12_000000_create_users_table.php';
        include_once __DIR__ . '/../src/database/migrations/2014_10_12_100000_create_password_resets_table.php';
        include_once __DIR__ . '/../src/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php';

        // run the up() method of that migration class
        (new \CreateUsersTable)->up();
        (new CreatePasswordResetsTable)->up();
        (new CreatePersonalAccessTokensTable)->up();
    }
}
