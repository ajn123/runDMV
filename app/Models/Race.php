<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'distances' => 'array',
        'date' => 'datetime'
    ];


}
