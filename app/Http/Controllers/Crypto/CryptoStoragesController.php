<?php

namespace App\Http\Controllers\crypto;

use App\CryptoStorage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CryptoStoragesController extends Controller
{
    public function index () {

        return view('crypto.storages.index');
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
        $rows = CryptoStorage::where('serial_number', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if (view()->exists('crypto.storages.create')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'serial_number' => 'required',
                    'comment' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/storages/create/')->withInput()->withErrors($validator);
                }

                CryptoStorage::create([
                    'serial_number' => $request->input('serial_number'),
                    'comment' => $request->input('comment'),
                ]);

                \Session::flash('success', 'Storage added successfully');

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

                $validator = Validator::make($request->all(), [
                    'serial_number' => 'required',
                    'comment' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/storages/edit/'.$id)->withInput()->withErrors($validator);
                }

                $storage = CryptoStorage::where('id','=', $id)->first();

                $storage->serial_number = $request->input('serial_number');
                $storage->comment = $request->input('comment');
                $storage->save();

                \Session::flash('success', 'Storage edited successfully');

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
