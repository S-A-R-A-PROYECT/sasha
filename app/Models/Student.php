<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\Contracts\OAuthenticatable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable implements OAuthenticatable
{
    /** @use HasFactory<\Database\Factories\StudentsFactory> */


    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = ['name',  'document', 'password', "last_name", "document_type", "grade", "fingerprint", "uuid", "journey", "birthday", "rh", "locality", "phone", "email", "last_login_ip", "last_login_at"];
    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'document';
    }

    public function getTypeAttribute()
    {
        return 'student';
    }
}
