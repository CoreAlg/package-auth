<?php

namespace CoreAlg\Auth\Adapters;

use CoreAlg\Auth\Interfaces\HashManagerInterface;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class LaravelEncrypterAdapter implements HashManagerInterface
{
    public function __construct()
    {
    }

    public function encrypt(string $data): string
    {
        try {
            return Crypt::encryptString($data);
        } catch (Exception $ex) {
            Log::error($ex);
            return "";
        }
    }

    public function decrypt(string $hash): string
    {
        try {
            return Crypt::decryptString($hash);
        } catch (DecryptException $ex) {
            Log::error($ex);
            return "";
        } catch (Exception $ex) {
            Log::error($ex);
            return "";
        }
    }
}
