<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Psy\debug;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = $request->session()->all();
        dump($data);

        return view('home');
    }
}
