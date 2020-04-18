<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room_details';

    public function match()
    {
      return $this->belongsTo(Match::class);
    }
}
