<?php

namespace CoreAlg\Auth\Interfaces;

interface HashManagerInterface
{
    public function encrypt(string $data): string;
    public function decrypt(string $hash): string;
}
