<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function profile () {

        $user = User::where('id', '=', Auth::user()->id)->first();

        $vars = [
            'user' => $user
        ];

        return view('auth.account.profile', $vars);
    }

    public function setting () {
        echo __METHOD__;
        return view('auth.account.setting');
    }
}
