<?php

namespace App\Http\Controllers\crypto;

use App\CryptoMcpiModels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CryptoMcpiModelsController extends Controller
{
    public function index () {

        return view('crypto.models.index');
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
        $rows = CryptoMcpiModels::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if (view()->exists('crypto.models.create')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'reg_number' => 'required',
                    'information' => 'required',
                    'comment' => 'required',
                    'date_from' => 'date|required',
                    'date_to' => 'date|required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/mcpi-models/create/')->withInput()->withErrors($validator);
                }

                CryptoMcpiModels::create([
                    'name' => $request->input('name'),
                    'reg_number' => $request->input('reg_number'),
                    'information' => $request->input('information'),
                    'comment' => $request->input('comment'),
                    'date_from' => $request->input('date_from'),
                    'date_to' => $request->input('date_to'),
                ]);

                \Session::flash('success', 'Model added successfully');

                return redirect('/crypto/mcpi-models');
            } else {
                return view('crypto.models.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.models.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'reg_number' => 'required',
                    'information' => 'required',
                    'comment' => 'required',
                    'date_from' => 'date|required',
                    'date_to' => 'date|required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/mcpi-models/edit/'.$id)->withInput()->withErrors($validator);
                }

                $mcpi_model = CryptoMcpiModels::where('id','=', $id)->first();

                $mcpi_model->name = $request->input('name');
                $mcpi_model->reg_number = $request->input('reg_number');
                $mcpi_model->information = $request->input('information');
                $mcpi_model->comment = $request->input('comment');
                $mcpi_model->date_from = $request->input('date_from');
                $mcpi_model->date_to = $request->input('date_to');
                $mcpi_model->save();

                \Session::flash('success', 'Model edited successfully');

                return redirect('/crypto/mcpi-models');
            } else {
                $mcpi_model = CryptoMcpiModels::where('id','=', $id)->first();

                if ($mcpi_model != null) {

                    $vars = [
                        'mcpi_model' => $mcpi_model,
                        'id' => $id
                    ];
                    return view('crypto.models.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.models.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
