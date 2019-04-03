<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function getNewsList() {
        echo __METHOD__;
        return view('news.list');
    }

    public function getNews() {
        echo __METHOD__;
        return view('news.post');
    }

    public function searchNews() {
        echo __METHOD__;
        return view('news.search');
    }

    public function createNews() {
        echo __METHOD__;
        return view('news.create');
    }

    public function editNews() {
        echo __METHOD__;
        return view('news.edit');
    }

    public function deleteNews() {
        echo __METHOD__;
        return view('news.delete');
    }
}
