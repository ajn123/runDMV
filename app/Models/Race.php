<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends RunningModel
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'distances' => 'array',
        'date' => 'datetime'
    ];


}
