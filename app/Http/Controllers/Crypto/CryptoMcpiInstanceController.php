<?php

namespace App\Http\Controllers\crypto;

use App\CryptoMcpiInstance;
use App\CryptoMcpiModels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoMcpiInstanceController extends Controller
{
    public function index () {
        $mcpi_instances = CryptoMcpiInstance::with(['model' => function($query){ $query->select('id', 'name');}])->orderBy('id', 'asc')->paginate(5);

        $vars = [
            'mcpi_instances' => $mcpi_instances
        ];

        return view('crypto.instance.index', $vars);
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
                    'models' => CryptoMcpiModels::select('id', 'name')->get(),
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
                        'models' => CryptoMcpiModels::select('id', 'name')->get(),
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
