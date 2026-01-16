<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post'; // your table name

    protected $fillable = [
        'title',
        'subject',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(Register::class, 'user_id');
    }
}
