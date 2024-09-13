<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class RunningModel extends Model
{
    public function scopeEnabled(Builder $builder): Builder
    {
        return $builder->where('enabled', true);
    }
}
