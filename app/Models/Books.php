<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'release_date',
        'withdrawal_date',
        'return_date'
    ];

    protected $dates = [
        'release_date',
        'withdrawal_date',
        'return_date'
    ];
}
