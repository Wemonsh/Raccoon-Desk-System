<?php

namespace App\Http\Controllers\Knowledge;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KnowledgeController extends Controller
{
    public function index() {
        echo __METHOD__;
        if (view()->exists('knowledge.index')) {
            return view('knowledge.index');
        } else {
            abort(404);
        }
    }

    public function show() {
        echo __METHOD__;
    }

    public function showCategory() {
        echo __METHOD__;
    }

    public function search() {
        echo __METHOD__;
    }

    public function create() {
        echo __METHOD__;
    }

    public function edit() {
        echo __METHOD__;
    }

    public function delete() {
        echo __METHOD__;
    }
}
