<?php

namespace App\Http\Controllers\Social;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PhonesController extends Controller
{
    public function index (Request $request) {

        if ($request->isMethod('POST')) {
            $users = User::select('id', 'last_name', 'first_name', 'middle_name', 'phone')->where(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name)"), "LIKE", '%'.$request['name'].'%')->get();

            $vars = [
              'users' => $users
            ];

            return view('social.phones.index', $vars);
        } else {
            return view('social.phones.index');
        }
    }
}
