<?php

namespace App\Models;

use App\Enums\RolType;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\TeachersFactory> */
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'uuid',
        'name',
        'last_name',
        'email',
        'grade',
        'document',
        'document_type',
        'rol',
        'password'
    ];
    protected $hidden = ['password'];

    public function getTypeAttribute()
    {
        if ($this->rol == RolType::Coordinator->value) {
            return 'coordinator';
        } else {
            return 'teacher';
        }
    }
}
