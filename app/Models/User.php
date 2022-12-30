<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'setor',
        'modulo',
        'ismanager',
        'islider',
        'code',
        'active',
        'name',
        'mobile',
        'email',
        'password',
        'password_mobile',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
