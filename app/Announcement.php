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
      return $this->join('announcement_read','announcement_read.announcement_id','<>','announcement_details.id')->count();
    }
}
