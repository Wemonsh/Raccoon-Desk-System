<?php

namespace App\Http\Controllers\Documents;

use App\DocIncoming;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

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

        $rows = DocIncoming::with('departament')->where('id_executor', '=', Auth::user()->id)->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function share(Request $request) {
        $document = DocIncoming::where('id', '=', $request->id_document)->first();
        $users = json_decode($document->users);
        if ($users == null) {
            $array = array();
            $array[] = $request->user;
            $users = json_encode($array);
        } else {
            $users[] = $request->user;
            $users = json_encode($users);
        }
        $document->users = $users;
        $document->save();
        return redirect('/documents/incoming/show/'.$request->id_document);
    }

    public function apiShare (Request $request) {
        $users = User::get()->toArray();

        return response()->json(
            [
                'rows' =>  $users,
            ]
        );
    }
}
