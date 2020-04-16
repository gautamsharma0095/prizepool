<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use ImageResize;

class ProfileController extends Controller
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
        $profile = User::find($id);
        return view('user.profile-edit', compact('profile'));
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

        return redirect()->back()->with('Profile edited successfully');
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
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('profile');
        $imageName = 'profile-'. time().'.'.$image->extension();
        $destinationPath = public_path('/uploads/thumbnail');
        $img = ImageResize::make($image->path());


        // --------- [ Resize Image ] ---------------

        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
        dd($destinationPath.'/'.$imageName);


        // ----------- [ Uploads Image in Original Form ] ----------

//        $destinationPath = public_path('/uploads/original');
//
//        $image->move($destinationPath, $input['imagename']);

        // store into database table

        $user = User::find($id);
        $user->profile = $destinationPath.'/'.$imagename;
        $user->save();

        return back()
            ->with('success', 'Image Uploaded successfully');
    }
}
