<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Participant;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Match::findOrFail($id);
        $participants = $this->participants($id);
        $totalParticipants = Participant::where('match_id', $id)->count();
        return view('matches.detail', [
            'match' => $match,
            'participants' => $participants,
            'totalParticipants' => $totalParticipants
        ]);
    }

    public function matchResult($id)
    {
        $match = Match::findOrFail($id);
        $participants = $this->participants($id);
        $totalParticipants = Participant::where('match_id', $id)->count();
        $firstThreeWinner = $match->firstThreeWinner();
        $fullResult = $match->fullResult();
        return view('matches.result', [
            'match' => $match,
            'participants' => $participants,
            'totalParticipants' => $totalParticipants,
            'firstThreeWinner' => $firstThreeWinner,
            'fullResult' => $fullResult,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function participants($matchId, $offset = 0)
    {
        return Participant::where('match_id', $matchId)
        ->select('pubg_id', 'created')
        ->offset($offset)
        ->limit(100)
        ->get();
    }
}
