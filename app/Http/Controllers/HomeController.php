<?php

namespace App\Http\Controllers;

use App\Events;
use App\Knowledge;
use App\News;
use App\Requests;
use App\User;
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

        $news = News::select('id', 'title', 'created_at', 'image', 'text')->orderByDesc('created_at')->take(5)->get()->toArray();
        $articles = Knowledge::select('id', 'title', 'created_at', 'views', 'text')->orderByDesc('views')->take(5)->get()->toArray();

        $vars = [
            'news' => $news,
            'articles' => $articles,
            'users_count' => User::count(),
            'articles_count' => Knowledge::count(),
            'requests_count' => Requests::count(),
            'events_count' => Events::count(),
        ];
        return view('home', $vars);
    }
}
