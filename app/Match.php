<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'match_details';

    public function scopeUpcoming($query)
    {
        return $query->where('match_status', 0);
    }

    public function scopeOngoing($query)
    {
        return $query->where('match_status', 1);
    }
}
