<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Register extends Authenticatable
{
    use Notifiable;

    protected $table = 'register'; // your custom table

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // add this if you have role
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
