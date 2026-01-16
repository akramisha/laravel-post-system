<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    use HasFactory;

    // Explicitly set the table name to 'register' as requested
    protected $table = 'register';

    // Allow mass assignment for these columns
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Hide the password when the model is converted to an array/JSON
    protected $hidden = [
        'password',
    ];

    // Assuming your 'register' table is not using Laravel's default 'created_at' and 'updated_at' columns.
    // If it *is* using them, you can remove this line.
    public $timestamps = false;
}