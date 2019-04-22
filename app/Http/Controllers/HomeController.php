<?php

namespace App\Http\Controllers;

use App\Knowledge;
use App\News;
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
        ];
        return view('home', $vars);
    }
}
