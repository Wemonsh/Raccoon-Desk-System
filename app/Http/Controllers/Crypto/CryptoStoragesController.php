<?php

namespace App\Http\Controllers\crypto;

use App\CryptoStorage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoStoragesController extends Controller
{
    public function index () {
        $storages = CryptoStorage::orderBy('id', 'asc')->paginate(5);

        $vars = [
            'storages' => $storages
        ];

        return view('crypto.storages.index', $vars);
    }

    public function create (Request $request) {
        if (view()->exists('crypto.storages.create')) {
            if ($request->isMethod('post')) {

                CryptoStorage::create([
                    'serial_number' => $request->input('serial_number'),
                    'comment' => $request->input('comment'),
                ]);

                return redirect('/crypto/storages');
            } else {
                return view('crypto.storages.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.storages.edit')) {
            if ($request->isMethod('post')) {
                $storage = CryptoStorage::where('id','=', $id)->first();

                $storage->serial_number = $request->input('serial_number');
                $storage->comment = $request->input('comment');
                $storage->save();

                return redirect('/crypto/storages');
            } else {
                $storage = CryptoStorage::where('id','=', $id)->first();

                if ($storage != null) {

                    $vars = [
                        'storage' => $storage,
                        'id' => $id
                    ];
                    return view('crypto.storages.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.storages.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
