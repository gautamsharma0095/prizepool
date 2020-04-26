<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participant_details';

    public function match(){
      return $this->belongsTo(Match::class);
    }
}
