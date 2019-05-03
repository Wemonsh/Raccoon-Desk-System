<?php

namespace App\Http\Controllers\social;

use App\Http\Controllers\Controller;
use App\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Validator;
use App\Events;

class EventsController extends Controller
{
    public function index() {
        $events = Events::get();
        $events_list = [];
        foreach ($events as $key => $event) {
            $events_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($events_list);

        $today_events = Events::where([['start_date', '<=', Carbon::now()->format('Y/m/d')],['end_date', '>=', Carbon::now()->format('Y/m/d')]])->orderBy('start_date', 'asc')->get();

        $vars = [
            'today_events' => $today_events,
        ];

        return view('social.event.index', compact('calendar_details'), $vars);
    }

    public function addEvent(Request $request) {

        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }

        $event = new Events;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();

        \Session::flash('success', 'Event added successfully');
        return Redirect::to('/events');
    }
}