<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\AnnouncementRead;
use App\Referral;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Datatables;

class AnnouncementController extends Controller
{
    public function index(){
        return view('/announcement/index');
    }

    public function list(){
      $announcement = Announcement::select('id','title','created')->orderBy('created','desc');

      return Datatables::of($announcement)
      ->editColumn('title', function($app) {
        return '<a href="'.route('announcement.show',['id'=>$app->id]).'">'.$app->title.'</a>';
    })
      ->editColumn('created', function($app) {
        return '<a href="'.route('announcement.show',['id'=>$app->id]).'">'.$app->created->diffForHumans().'</a>';
    })
    ->rawColumns(['title', 'created'])
      ->make(true);
    }

    public function show($id){
      $announcement = Announcement::findOrFail($id);
      $announcementRead = AnnouncementRead::updateOrCreate(
        ['announcement_id' => $id,'user_id' => auth()->user()->id],
        ['announcement_id' => $id,'user_id' => auth()->user()->id]
    );
      return view('/announcement/show',compact('announcement'));
  }
}
