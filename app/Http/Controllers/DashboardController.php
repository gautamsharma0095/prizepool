<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use App\Game;
use App\Participant;

class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function dashboardAnalytics(){

        $games = Game::all();
        return view('dashboard.index', [
            'games' => $games
        ]);
    }

    public function ongoingMatches($id) {

      $gameId = $id;
      $ongoing = 1;
      $matches = Match::ongoing()->where('game_id', $id)->get();

        return view('dashboard.match', [
            'matches' => $matches,
            'gameId' => $gameId,
            'ongoing' => $ongoing,
        ]);
    }

    public function upcomingMatches($id) {

      $gameId = $id;
      $upcoming = 1;
      $matches = Match::upcoming()->where('game_id', $id)->get();

        return view('dashboard.match', [
            'matches' => $matches,
            'gameId' => $gameId,
            'upcoming' => $upcoming,
        ]);

    }

    public function finishedMatches($id) {

      $gameId = $id;
      $finished = 1;
      $matches = Match::finished()->where('game_id', $id)->join('participant_details','participant_details.match_id','=','match_details.id')->where("participant_details.user_id",auth()->user()->id)->select('match_details.*')->distinct('match_details.id')->get();

        return view('dashboard.match', [
            'matches' => $matches,
            'gameId' => $gameId,
            'finished' => $finished,
        ]);

    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce(){
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/pages/dashboard-ecommerce', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}

