<?php

namespace App\Http\Controllers\Knowledge;

use App\Knowledge;
use App\KnowledgeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KnowledgeController extends Controller
{
    public function index() {
        if (view()->exists('knowledge.index')) {
            $knowledge = KnowledgeCategory::with(array('knowledge'=>function($query){
                $query->select('id','title', 'created_at','id_category');
            }))->get()->toArray();
            $articleNew = Knowledge::select('id', 'title', 'created_at')->orderByDesc('created_at')->take(5)->get()->toArray();
            $articlePopular = Knowledge::select('id', 'title', 'created_at', 'views')->orderByDesc('views')->take(5)->get()->toArray();
            $articlePinned = Knowledge::select('id', 'title', 'created_at', 'pinned')->where('pinned', '=', '1')->take(5)->get()->toArray();
            $vars = [
                'knowledge' => $knowledge,
                'articleNew' => $articleNew,
                'articlePopular' => $articlePopular,
                'articlePinned' => $articlePinned
            ];
            return view('knowledge.index', $vars);
        } else {
            abort(404);
        }
    }

    public function show(Request $request, $id) {
        if (view()->exists('knowledge.show')) {
            $article = Knowledge::with('knowledgeCategory', 'user')->where('id','=', $id)->first();

            $article->timestamps = false;
            $article->increment('views');
            $article->timestamps = true;

            $vars = [
                'article' => $article->toArray()
            ];

            return view('knowledge.show', $vars);
        } else {
            abort(404);
        }
    }

    public function showCategory($id) {
        if (view()->exists('knowledge.category')) {
            $articles = Knowledge::join('users', 'knowledge.id_user', '=', 'users.id')->select('knowledge.id', 'knowledge.title', 'knowledge.created_at', 'knowledge.views', 'users.first_name', 'users.last_name', 'users.middle_name', 'users.id as id_user')->where('knowledge.id_category', '=', $id)->orderBy('created_at', 'desc')->paginate(5);
            $category = KnowledgeCategory::where('id', '=', $id)->first();

            if($articles != null && $category != null) {
                $vars = [
                    'articles' => $articles,
                    'category' => $category
                ];

                return view('knowledge.category', $vars);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function search(Request $request) {
        if (view()->exists('knowledge.search')) {
            if ($request->isMethod('post')) {
                $value = $request->value;
                $articles = Knowledge::select('id', 'title', 'created_at')->where('title','LIKE','%'.$value.'%')->get()->toArray();

                $vars = [
                    'value' => $value,
                    'articles' => $articles
                ];

                return view('knowledge.search', $vars);
            } else {
                return redirect('knowledge');
            }
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('knowledge.create')) {
            if ($request->isMethod('post')) {

                $files = $request->file('file');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/knowledge', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $json = json_encode($array);
                }

                Knowledge::create([
                    'title' => $request->input('title'),
                    'text' => $request->input('text'),
                    'id_category' => $request->input('id_category'),
                    'files' => $json,
                    'pinned' => $request->input('pinned') == null? 0 : 1,
                    'id_user' => Auth::user()->id
                ]);
                return redirect('knowledge');
            } else {
                $vars = [
                    'category' => KnowledgeCategory::all(),
                ];
                return view('knowledge.create', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('knowledge.edit')) {
            if ($request->isMethod('post')) {
                $article = Knowledge::with('knowledgeCategory', 'user')->where('id','=', $id)->first();

                // Логика добавления новых файлов в статью
                $files = $request->file('file');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/knowledge', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $jsonDecode = json_decode($article->files);
                    if ($jsonDecode != null) {
                        foreach ($array as $file) {
                            array_push($jsonDecode, $file);
                        }
                        $json = json_encode($jsonDecode);
                    } else {
                        $json = json_encode($array);
                    }
                    $article->files = $json;
                }
                //

                $article->title = $request->input('title');
                $article->text = $request->input('text');
                $article->id_category = $request->input('id_category');
                $article->pinned = $request->input('pinned') == null? 0 : 1;
                $article->save();

                return redirect('knowledge');
            } else {
                $article = Knowledge::with('knowledgeCategory', 'user')->where('id','=', $id)->first();
                if ($article != null) {
                    $vars = [
                        'article' => $article,
                        'id' => $id,
                        'category' => KnowledgeCategory::all()
                    ];
                    return view('knowledge.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('knowledge.edit');
        } else {
            abort(404);
        }
    }

    public function delete() {
        echo __METHOD__;
    }
}
