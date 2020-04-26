<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferEarnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.refer-earn');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendCode(Request $request)
    {
//        $emailTo = explode($request->emailTo,',');

        $to = $request->emailTo;
        $subject = "Play & Earn make cash with Skywinner";

        $message = view('global.refer-mail-body')->render();

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <testing@skyforcoding.com>' . "\r\n";

        try{
            if(mail($to,$subject,$message,$headers)){
                return back()->with('success', 'Promo code send successfully.');
            } else {
                return back()->with('error', 'Network issue try again..');
            }
        } catch (\Exception $e) {
            \Log::info($e);
            return back()->with('error', 'Network issue try again.');
        }
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
        //
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
}
