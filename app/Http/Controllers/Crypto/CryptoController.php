<?php

namespace App\Http\Controllers\Crypto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoController extends Controller
{
    public function index() {
        return view('crypto.index');
    }
}
