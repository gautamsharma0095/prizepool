<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function dashboardAnalytics(){

        $games = 
        return view('dashboard.index', [
            'pageConfigs' => $pageConfigs
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

