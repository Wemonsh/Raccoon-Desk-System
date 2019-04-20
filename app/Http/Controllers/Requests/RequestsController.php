<?php

namespace App\Http\Controllers\Requests;

use App\Requests;
use App\RequestsCategory;
use App\RequestsPriority;
use App\RequestsStatuses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public  function create(Request $request) {
        if (view()->exists('requests.create')) {
            if ($request->isMethod('post')) {

                $files = $request->file('file');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/requests', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $json = json_encode($array);
                }

                $status = RequestsStatuses::where('id', '=', '1')->first();

                Requests::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'ip' => request()->ip(),
                    'files' => $json,
                    'id_priority' => $request->input('id_priority'),
                    'id_category' => $request->input('id_category'),
                    'id_user' => Auth::user()->id,
                    'id_status' => $status->id,
                    'date_of_creation' => Carbon::now(),
                ]);

                return redirect('/requests/created');
            } else {

                $vars = [
                    'priority' => RequestsPriority::all(),
                    'user' => Auth::user(),
                    'category' => RequestsCategory::all(),
                    'status' => RequestsStatuses::all(),
                ];
                return view('requests.create', $vars);
            }
        } else {
            abort(404);
        }
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
