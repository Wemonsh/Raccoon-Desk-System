<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestsController extends Controller
{
    public  function create() {
        return view('requests.create');
    }

    public  function created() {
        return view('requests.created');
    }

    public  function search() {
        return view('requests.search');
    }

    public  function accepted() {
        return view('requests.accepted');
    }

    public  function received() {
        return view('requests.received');
    }

    public  function history() {
        return view('requests.history');
    }

    public  function reports() {
        return view('requests.reports');
    }
}
