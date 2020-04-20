<?php

namespace App\Http\Controllers;

use App\Referral;
use App\Rules\MatchOldPassword;
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

      $terms = \App\TermCondition::first();
      $policy = \App\PrivacyPolicy::first();
      return view('/pages/auth-register', [
          'pageConfigs' => $pageConfigs,
          'term' => $terms,
          'policy' => $policy
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

    // Logout Screen
    public function logout(){
      Auth::logout();
	    return redirect()->route('loginPage');
    }

     // Change Password
     public function changePassword(){
      return view('/pages/change_password');
    }

     // Change Password Action
     public function changePasswordAction(Request $request)
     {
      $request->validate([
          'current_password' => ['required', new MatchOldPassword],
          'new_password' => ['required'],
          'confirmed' => ['same:new_password'],
      ]);

      User::find(auth()->user()->id)->update(['password'=> md5($request->new_password)]);
      return back()->with('success', 'Password changed successfully.');
    }

    public function registerUser(Request $request)
    {
//        $request->validate([
//            'fname' => ['required'],
//            'lname' => ['required'],
//            'username' => ['required', 'unique:user_details'],
//            'mobile' => ['required', 'digits:10', 'unique:user_details'],
//            'email' => ['email', 'unique:user_details'],
//            'password' => ['required'],
//            'confirm_password' => ['same:password'],
//        ]);

        $referer = null;
        if(!empty($request->promo_code)) {

            $referer = User::where('refer', $request->promo_code)->where('status', 1)->first();
        }

        if(is_null($referer)) {

            return back()->with('error', 'User registered successfully.');
        }

        $refer_bonus = $referer ? config('custom.refer_amount') : 0;
        $today = date("Y-m-d");

        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->refer = $request->username;
        $user->referer = $request->promo_code;
        $user->user_type = 'Normal';
        $user->created_date = $today;
        $user->status = '1';
        $user->created_date = $today;
        $user->cur_balance = $refer_bonus;
        $user->bonus_balance = $refer_bonus;
        $user->won_balance = '0';
        $user->save();

        if($referer) {
            User::where('refer', $request->promo_code)->where('status', 1)->update([
                'refered' => $referer->refred + 1
            ]);

            Referral::insert([
                'username' => $request->username,
                'refer_points' => '0',
                'refer_code' => $request->promo_code,
                'refer_status' => '0',
                'refer_date' => $today
            ]);
        }

        return back()->with('success', 'User registered successfully.');
    }
}
