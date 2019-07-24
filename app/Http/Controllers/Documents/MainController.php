<?php

namespace App\Http\Controllers\Documents;

use App\DocIncoming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        return view('documents.documents');
    }
    public function apiResponse (Request $request) {
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];

        if (empty($sortName)) {
            $sortName = 'id';
        }

        $rows = DocIncoming::where('id_executor', '=', Auth::user()->id)->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}
