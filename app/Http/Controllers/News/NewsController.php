<?php

namespace App\Http\Controllers\News;

use App\News;
use App\NewsCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function getNewsList() {
        $news = News::with('user')->orderBy('id', 'desc')->paginate(6);

        $vars = [
            'news' => $news
        ];
        return view('news.list', $vars);
    }

    public function getNews($id) {
        if (view()->exists('news.post')) {
            $news = News::with('newsCategory', 'user')->where('id','=',$id)->first();
            if ($news != null) {
                $news->views++;
                $news->save();
                $vars = [
                    'news' => $news
                ];
                //dump($news);
                return view('news.post', $vars);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function searchNews() {
        echo __METHOD__;
        return view('news.search');
    }

    public function createNews(Request $request) {
        if (view()->exists('news.create')) {
            if ($request->isMethod('post'))
            {
                $image = null;

                if ($request->file('image') != null) {
                    $image = $request->file('image')->store('/avatars', 'public');
                } else {
                    // Стандартная картинка
                }

                News::create([
                    'title' => $request->input('title'),
                    'text' => $request->input('text'),
                    'image' => $image,
                    'id_category' => $request->input('id_category'),
                    'id_user' => Auth::user()->id,
                ]);

                return redirect('news');
            } else {
                $vars = [
                    'category' => NewsCategory::all(),
                ];
                return view('news.create', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function editNews($id, Request $request) {
        if ($request->isMethod('get')){
            if (view()->exists('news.edit')) {
                $news = News::with('newsCategory', 'user')->where('id','=',$id)->first();
                if ($news != null) {
                    $vars = [
                        'news' => $news,
                        'id' => $id,
                        'category' => NewsCategory::all()
                    ];
                    return view('news.edit', $vars);
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } else if ($request->isMethod('post')) {

            $news = News::with('newsCategory', 'user')->where('id','=',$id)->first();
            $news->title = $request->input('title');
            $news->text = $request->input('text');
            $news->id_category = $request->input('id_category');

            if ($request->file('image') != null) {
                $image = $request->file('image')->store('/avatars', 'public');
                $news->image = $image;
            }

            $news->save();

            return redirect('news');
        } else {
            return view('news');
        }
    }

    public function showCategory($id) {
        if (view()->exists('news.category')) {
            // TODO Оптимизировать запрос без подгрузки всех данных пользователей и текста новости!
            //$news = News::with(['user' => function($query){ $query->select('id', 'first_name');}])->select('id', 'title', 'created_at', 'views')->where('id_category','=',$id)->get()->toArray();

            $news = News::with(['user' => function($query){ $query->select('id', 'first_name', 'last_name', 'middle_name');}])
                ->where('id_category','=',$id)->orderBy('created_at', 'desc')->paginate(5);
            $category = NewsCategory::where('id', '=', $id)->first();

            if($news != null && $category != null) {

                $vars = [
                    'news' => $news,
                    'category' => $category
                ];

                return view('news.category', $vars);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function deleteNews() {
        echo __METHOD__;
        return view('news.delete');
    }
}
