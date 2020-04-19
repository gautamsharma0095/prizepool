<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\About;
use App\PrivacyPolicy;
use App\TermCondition;

class MyAccountController extends Controller
{
    public function customerSupport()
    {
        $support = Contact::first();
        return view('global.customer-support', compact('support'));
    }

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('global.privacy-policy', compact('privacyPolicy'));
    }

    public function termCondition()
    {
        $termCondition = TermCondition::first();
        return view('global.term-condition', compact('termCondition'));
    }

    public function about()
    {
        $about = About::first();
        return view('global.about', compact('about'));
    }

}
