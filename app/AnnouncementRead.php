<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementRead extends Model
{
  protected $table = 'announcement_read';

  public static function announcement(){
    return $this->belongsTo(Announcement::class);
  }
}
