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
        echo __METHOD__;
        if (view()->exists('knowledge.index')) {
            $knowledge = KnowledgeCategory::with(array('knowledge'=>function($query){
                $query->select('id','title', 'created_at','id_category');
            }))->get()->toArray();
            $vars = [
                'knowledge' => $knowledge
            ];
            return view('knowledge.index', $vars);
        } else {
            abort(404);
        }
    }

    public function show(Request $request, $id) {
        echo __METHOD__;
        if (view()->exists('knowledge.show')) {
            $article = Knowledge::with('knowledgeCategory', 'user')->where('id','=', $id)->first()->toArray();
            $vars = [
                'article' => $article
            ];
            return view('knowledge.show', $vars);
        } else {
            abort(404);
        }
    }

    public function showCategory() {
        echo __METHOD__;
    }

    public function search() {
        echo __METHOD__;
    }

    public function create(Request $request) {
        if (view()->exists('knowledge.create')) {
            if ($request->isMethod('post')) {
                Knowledge::create([
                    'title' => $request->input('title'),
                    'text' => $request->input('text'),
                    'id_category' => $request->input('id_category'),
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

    public function edit() {
        echo __METHOD__;
    }

    public function delete() {
        echo __METHOD__;
    }
}
