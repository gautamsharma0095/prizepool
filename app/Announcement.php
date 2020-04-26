<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement_details';
    protected $dates = [
      'created',
  ];

    public function AnnouncementRead(){
      return $this->hasOne(AnnouncementRead::class);
    }

    public function getTopFiveNotification()
    {
      return $this->limit(5)->orderBy('created','DESC')->get();
    }

    public function getUnreadNotificationCount()
    {
      return $this->whereNotIn('id', function($query){
        $query->select('announcement_id')
        ->from(with(new AnnouncementRead)->getTable())
        ->where('user_id','=', auth()->user()->id);
      })
      ->count();
    }
}
