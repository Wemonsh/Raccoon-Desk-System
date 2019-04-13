<?php

namespace App\Http\Controllers\crypto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoOrganizationsController extends Controller
{
    public function index () {
        echo __METHOD__;
        return view('crypto.organizations.index');
    }

    public function show () {
        echo __METHOD__;

    }

    public function create () {
        echo __METHOD__;

    }

    public function edit () {
        echo __METHOD__;

    }

    public function delete () {
        echo __METHOD__;

    }
}
