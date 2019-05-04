<?php

namespace App\Http\Controllers\crypto;

use App\CryptoMcpiInstance;
use App\CryptoMcpiModels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoMcpiInstanceController extends Controller
{
    public function index () {

        return view('crypto.instance.index');
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
        $rows = CryptoMcpiInstance::with('model')->where('serial_number', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if (view()->exists('crypto.instance.create')) {
            if ($request->isMethod('post')) {

                CryptoMcpiInstance::create([
                    'serial_number' => $request->input('serial_number'),
                    'id_models' => $request->input('id_models'),
                    'comment' => $request->input('comment'),
                ]);

                return redirect('/crypto/mcpi-instances');
            } else {

                $vars = [
                    'models' => CryptoMcpiModels::pluck('name', 'id'),
                ];
                return view('crypto.instance.create', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.instance.edit')) {
            if ($request->isMethod('post')) {
                $mcpi_instance = CryptoMcpiInstance::where('id','=', $id)->first();

                $mcpi_instance->serial_number = $request->input('serial_number');
                $mcpi_instance->id_models = $request->input('id_models');
                $mcpi_instance->comment = $request->input('comment');
                $mcpi_instance->save();

                return redirect('/crypto/mcpi-instances');
            } else {
                $mcpi_instance = CryptoMcpiInstance::with(['model' => function($query){ $query->select('id', 'name');}])->where('id','=', $id)->first();

                if ($mcpi_instance != null) {

                    $vars = [
                        'mcpi_instance' => $mcpi_instance,
                        'id' => $id,
                        'models' => CryptoMcpiModels::pluck('name', 'id'),
                    ];
                    return view('crypto.instance.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.instance.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
