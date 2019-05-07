<?php

namespace App\Http\Controllers\News;

use App\News;
use App\NewsCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
                $news->timestamps = false;
                $news->increment('views');
                $news->timestamps = false;

                $vars = [
                    'news' => $news
                ];

                return view('news.post', $vars);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function searchNews(Request $request) {
        if (view()->exists('news.search')) {
            if ($request->isMethod('post')) {
                $value = $request->value;

                //$news = News::with('user')->select('id', 'title', 'created_at', 'views')->where('title','LIKE','%'.$value.'%')->get();
                $news = News::join('users', 'news.id_user', '=', 'users.id')->select('news.id', 'news.title', 'news.created_at', 'news.views', 'users.first_name', 'users.last_name', 'users.middle_name', 'users.id as id_user')->where('news.title', 'LIKE', '%'.$value.'%')->orderBy('created_at', 'desc')->paginate(5);

                $vars = [
                    'value' => $value,
                    'news' => $news
                ];

                return view('news.search', $vars);
            } else {
                $value = $request->value;

                //$news = News::with('user')->select('id', 'title', 'created_at', 'views')->where('title','LIKE','%'.$value.'%')->get();
                $news = News::join('users', 'news.id_user', '=', 'users.id')->select('news.id', 'news.title', 'news.created_at', 'news.views', 'users.first_name', 'users.last_name', 'users.middle_name', 'users.id as id_user')->where('news.title', 'LIKE', '%'.$value.'%')->orderBy('created_at', 'desc')->paginate(5);

                $vars = [
                    'value' => $value,
                    'news' => $news
                ];

                return view('news.search', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function createNews(Request $request) {
        if (view()->exists('news.create')) {
            if ($request->isMethod('post'))
            {
                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'text' => 'required',
                    'image' => 'image',
                    'id_category' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/news/post/create/')->withInput()->withErrors($validator);
                }

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

                \Session::flash('success', 'News added successfully');

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

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                // TODO Поле text не срабатывает при редактировании новости, пустые теги внутри
                'text' => 'required',
                'image' => 'image',
                'id_category' => 'required',
            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('/news/post/edit/'.$id)->withInput()->withErrors($validator);
            }

            $news = News::with('newsCategory', 'user')->where('id','=',$id)->first();
            $news->title = $request->input('title');
            $news->text = $request->input('text');
            $news->id_category = $request->input('id_category');

            if ($request->file('image') != null) {
                $image = $request->file('image')->store('/avatars', 'public');
                $news->image = $image;
            }

            $news->save();

            \Session::flash('success', 'News edited successfully');

            return redirect('news');
        } else {
            return view('news');
        }
    }

    public function showCategory($id) {
        if (view()->exists('news.category')) {
            $news = News::join('users', 'news.id_user', '=', 'users.id')->select('news.id', 'news.title', 'news.created_at', 'news.views', 'users.id as id_user', 'users.first_name', 'users.last_name', 'users.middle_name')->where('news.id_category', '=', $id)->orderBy('created_at', 'desc')->paginate(5);
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
