<?php

namespace App\Http\Controllers\Crypto\Documents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsKeyCreateController extends Controller
{
    public function index() {
        return view('crypto.documents.keyCreate.index');
    }

    public function create() {
        return view('crypto.documents.keyCreate.create');
    }
}
