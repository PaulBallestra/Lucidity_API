<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'user_id',
        'date',
        'isLucid'
    ];
}
