<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	const UPCOMING = 0;
    const ONGOING = 1;
    const FINISHED = 2;

    protected $table = 'match_details';

    public function scopeUpcoming($query)
    {
        return $query->where('match_status', self::UPCOMING);
    }

    public function scopeOngoing($query)
    {
        return $query->where('match_status', self::ONGOING);
    }

    public function scopeFinished($query)
    {
        return $query->where('match_status', self::FINISHED);
    }

    public function slotLeft()
    {
      $roomSize = $this->roomSize();
      $totalParticipants = $this->totalParticipants();
      return ($roomSize - $totalParticipants);
    }

    public function userJoinedCount()
    {
      $userId = auth()->user()->id;
      $count = $this->participants()->where('user_id',$userId)->count();
      return $count;
    }

    public function roomSize()
    {
        return $this->room->room_size;
    }

    public function totalParticipants()
    {

        return $this->participants()->count();
    }

    public function rule()
    {
        return $this->belongsTo('\App\Rule', 'match_rules', 'rule_id');
    }

    public function room(){
      return $this->hasOne(Room::class);
    }

    public function participants(){
      return $this->hasMany(Participant::class);
    }

    public function firstThreeWinner(){
      $winner = $this->participants()->where('match_id',$this->id)->whereIn('win',[1,2,3])->orderBy('win','asc')->get();
      return $winner;
    }

    public function fullResult(){
      $winner = $this->participants()->where('match_id',$this->id)->orderBy('prize','desc')->get();
      return $winner;
    }
}
