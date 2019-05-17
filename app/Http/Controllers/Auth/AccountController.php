<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function profile () {

        $user = User::where('id', '=', Auth::user()->id)->first();

        $vars = [
            'user' => $user
        ];

        return view('auth.account.profile', $vars);
    }

    public function setting (Request $request) {
        if (view()->exists('auth.account.setting')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'phone' => 'required',
                    'email' => 'email|required',
                    'date_birth' => 'date_format:Y-m-d|required',
                    'photo' => 'image',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/account/setting')->withInput()->withErrors($validator);
                }

                $user = User::where('id', '=', Auth::user()->id)->first();

                $file = $request->file('photo');

                if ($file != null) {
                    $file = $request->file('photo')->store('/avatars', 'public');
                    $user->photo = $file;
                } else {
                    // Стандартное действие
                }

                $user->phone = $request->input('phone');
                $user->email = $request->input('email');
                $user->date_birth = $request->input('date_birth');
                $user->save();

                \Session::flash('success', 'Settings edited successfully');

                return redirect('/account/setting');
            } else {

                $user = User::where('id', '=', Auth::user()->id)->first();

                if ($user != null) {

                    $vars = [
                        'user' => $user
                    ];
                    return view('auth.account.setting', $vars);
                } else {
                    abort(404);
                }
            }
            return view('auth.account.setting');
        } else {
            abort(404);
        }
    }
}
