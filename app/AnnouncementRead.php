<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementRead extends Model
{
  protected $table = 'announcement_read';
  protected $fillable = ['announcement_id', 'user_id'];
  public $timestamps = false;

  public static function announcement(){
    return $this->belongsTo(Announcement::class);
  }
}
