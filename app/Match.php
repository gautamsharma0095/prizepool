<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	const UPCOMING = 0;
    const ONGOING = 1;
    const COMPLETED = 2;

    protected $table = 'match_details';

    public function scopeUpcoming($query)
    {
        return $query->where('match_status', self::UPCOMING);
    }

    public function scopeOngoing($query)
    {
        return $query->where('match_status', self::ONGOING);
    }
}
