<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use App\Game;

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

        $matches = Match::ongoing()->where('game_id', $id);
    }

    public function upcomingMatches() {

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

