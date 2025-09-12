<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\TeachersFactory> */
    use HasFactory, HasApiTokens;
    protected $fillable = ['name', 'last_name', 'email', 'password'];
    protected $hidden = ['password'];
}
