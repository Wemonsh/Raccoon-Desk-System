<?php

namespace App\Http\Controllers\social;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Psy\debug;

class MessageController extends Controller
{
    public function index() {
        return view('social.message.index');
    }
    public function send() {

        $users = User::select('id','first_name','last_name','middle_name')->get()->toArray();

        $vars = [
            'users' => $users
        ];

        return view('social.message.send', $vars);
    }

}
