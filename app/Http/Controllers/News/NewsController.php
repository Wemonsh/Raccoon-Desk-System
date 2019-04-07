<?php

namespace App\Http\Controllers\News;

use App\News;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function getNewsList() {
        echo __METHOD__;

        $news = News::with('user')->orderBy('id', 'desc')->paginate(5);

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
            return view('news.create');
        }
    }

    public function editNews($id, Request $request) {
        if ($request->isMethod('get')){
            if (view()->exists('news.edit')) {
                $news = News::with('newsCategory', 'user')->where('id','=',$id)->first();
                if ($news != null) {
                    $vars = [
                        'news' => $news,
                        'id' => $id
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

    public function deleteNews() {
        echo __METHOD__;
        return view('news.delete');
    }
}
