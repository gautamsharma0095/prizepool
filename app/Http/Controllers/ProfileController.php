<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = User::find(auth()->id());
        return view('user.profile-edit', compact('profile'));
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
        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->dob = $request->dateOfBirth;
        $user->gender = $request->gender ? 'm' : 'f';
        $user->save();

        return back()->with('success', 'Profile edited successfully');
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

    public function changePicture(Request $request, $id)
    {
        /*$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/

        $image = $request->file('profile');
        $imageName = 'profile-'. time().'.'.$image->getClientOriginalExtension();
        $path = '/uploads/thumbnail';
        $destinationPath = public_path($path);
        $image->move($destinationPath, $imageName);

        $user = User::find($id);
        $user->user_profile = $path . '/'. $imageName;
        $user->save();

        return back()
            ->with('success', 'Profile picture uploaded successfully');
    }

    public function removePicture($id)
    {
        $user = User::find($id);
        $user->user_profile = NULL;
        $user->save();

        return back()
            ->with('success', 'Profile picture removed successfully');
    }
}
