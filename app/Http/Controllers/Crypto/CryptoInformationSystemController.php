<?php

namespace App\Http\Controllers\crypto;

use App\CryptoInformationSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CryptoInformationSystemController extends Controller
{
    public function index () {

        return view('crypto.infosystems.index');
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
        $rows = CryptoInformationSystem::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if (view()->exists('crypto.infosystems.create')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'comment' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/info-systems/create/')->withInput()->withErrors($validator);
                }

                CryptoInformationSystem::create([
                    'name' => $request->input('name'),
                    'comment' => $request->input('comment'),
                ]);

                \Session::flash('success', 'Info-system added successfully');

                return redirect('/crypto/info-systems');
            } else {
                return view('crypto.infosystems.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.infosystems.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'comment' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/info-systems/edit/'.$id)->withInput()->withErrors($validator);
                }

                $info_system = CryptoInformationSystem::where('id','=', $id)->first();

                $info_system->name = $request->input('name');
                $info_system->comment = $request->input('comment');
                $info_system->save();

                \Session::flash('success', 'Info-system edited successfully');

                return redirect('/crypto/info-systems');
            } else {
                $info_system = CryptoInformationSystem::where('id','=', $id)->first();

                if ($info_system != null) {

                    $vars = [
                        'info_system' => $info_system,
                        'id' => $id
                    ];
                    return view('crypto.infosystems.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.infosystems.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
