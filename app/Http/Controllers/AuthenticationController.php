<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    // Login
    public function login(){
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/pages/auth-login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    // Login
    public function loginAction(Request $request){
      $input = $request->all();

      $this->validate($request, [
          'email_or_username' => 'required',
          'password' => 'required',
      ]);

      $user = User::where('email',$input['email_or_username'])->where('password',md5($input['password']))
                  ->orWhere(function($query) use($input)
                    {
                      $query->where('username', $input['email_or_username'])
                      ->where('password',md5($input['password']));
                    })
                  ->first();
      if($user)
      {
        Auth::login($user);
        return redirect('dashboard-analytics');
      }
      else
      {
        return redirect()->route('loginPage')->withErrors(['error' => 'Username or Email or Password Are Wrong.']);
      }
    }

    // Register
    public function register(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/pages/auth-register', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Forgot Password
    public function forgot_password(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/pages/auth-forgot-password', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Reset Password
    public function reset_password(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/pages/auth-reset-password', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Lock Screen
    public function lock_screen(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/pages/auth-lock-screen', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Lock Screen
    public function logout(){
      Auth::logout();
	    return redirect()->route('loginPage');
    }
}
