<?php

namespace App\Http\Controllers\crypto;

use App\CryptoAssignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CryptoAssignmentsController extends Controller
{
    public function index () {

        return view('crypto.assignments.index');
    }

    public function apiResponse (Request $request) {
        // получаем значения из request
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];
        // Сортировка
        if (empty($sortName)) {
            $sortName = 'id';
        }
        // Выбор данных и пагинация
        $rows = CryptoAssignment::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if (view()->exists('crypto.assignments.create')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'comment' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/assignments/create/')->withInput()->withErrors($validator);
                }

                CryptoAssignment::create([
                    'name' => $request->input('name'),
                    'comment' => $request->input('comment'),
                ]);

                \Session::flash('success', 'Assignment added successfully');

                return redirect('/crypto/assignments/');
            } else {
                return view('crypto.assignments.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.assignments.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'comment' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/assignments/edit/'.$id)->withInput()->withErrors($validator);
                }

                $assignment = CryptoAssignment::where('id','=', $id)->first();

                $assignment->name = $request->input('name');
                $assignment->comment = $request->input('comment');
                $assignment->save();

                \Session::flash('success', 'Assignment edited successfully');

                return redirect('/crypto/assignments/');
            } else {
                $assignment = CryptoAssignment::where('id','=', $id)->first();

                if ($assignment != null) {

                    $vars = [
                        'assignment' => $assignment,
                        'id' => $id
                    ];
                    return view('crypto.assignments.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.assignments.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
