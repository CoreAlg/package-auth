<?php

namespace CoreAlg\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \CoreAlg\Auth\Database\Factories\UserFactory::new();
    }
}
