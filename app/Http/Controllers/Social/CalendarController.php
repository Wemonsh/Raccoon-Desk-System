<?php

namespace App\Http\Controllers\social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function show () {
        return view('social/calendar.show');
    }
}
