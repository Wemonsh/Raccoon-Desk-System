<?php

namespace App\Http\Controllers\Documents;

use App\DocDepartament;
use App\DocExecutor;
use App\DocIncoming;
use App\DocKorrespondent;
use App\DocKurator;
use App\DocType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IncomingController extends Controller
{
    public function index() {
        return view('documents.incoming.index');
    }

    public function create(Request $request) {
        if ($request->isMethod('POST')) {

            $files = $request->file('files');
            $json = null;
            if ($files != null) {
                $array = [];
                $counter = 0;
                foreach ($files as $file) {
                    $array[$counter]['id'] = $counter;
                    $array[$counter]['path'] = $file->store('/knowledge', 'public');
                    $array[$counter]['name'] = $file->getClientOriginalName();
                    $counter++;
                }
                $json = json_encode($array);
            }

            DocIncoming::create(
                [
                    'date_of_registration' => $request['date_of_registration'],
                    'pages' => $request['pages'],
                    'other_korrespondent' => $request['other_korrespondent'],
                    'index_korrespondent' => $request['index_korrespondent'],
                    'date' => $request['date'],
                    'content' => $request['content'],
                    'date_of_resolution' => $request['date_of_resolution'],
                    'resolution' => $request['resolution'],
                    'date_of_execution' => $request['date_of_execution'],
                    'date_of_end_execution' => $request['date_of_end_execution'],
                    'id_departament' => $request['id_departament'],
                    'id_korrespondent' => $request['id_korrespondent'],
                    'id_type' => $request['id_type'],
                    'id_kurator' => $request['id_kurator'],
                    'id_executor' => $request['id_executor'],
                    'id_user' => Auth::user()->id,
                    'files' => $json
                ]
            );

            return redirect('/documents/incoming');
        } else {
            $vars = [
                'departaments' => DocDepartament::get(),
                'korrespondents' => DocKorrespondent::get(),
                'types' => DocType::get(),
                'kurators' => DocKurator::get(),
                'executors' => User::get()

            ];
            return view('documents.incoming.create', $vars);
        }

    }

    public function show(Request $request) {
        $document = DocIncoming::where('id', '=', $request['id'])->first();
        $vars = [
          'document' => $document
        ];
        return view('documents.incoming.show', $vars);
    }

    public function apiResponse (Request $request) {
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];

        if (empty($sortName)) {
            $sortName = 'id';
        }

        $rows = DocIncoming::orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}
