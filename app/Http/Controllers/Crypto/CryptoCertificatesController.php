<?php

namespace App\Http\Controllers\crypto;

use App\CryptoAssignment;
use App\CryptoCertificate;
use App\CryptoOrganization;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CryptoCertificatesController extends Controller
{
    public function index () {

        return view('crypto.certificates.index');
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
        $rows = CryptoCertificate::with('user')->with('organization')->with('assignment')->where('serial_number', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if (view()->exists('crypto.certificates.create')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'serial_number' => 'required',
                    'id_organization' => 'required',
                    'id_user' => 'required',
                    'id_assignment' => 'required',
                    'date_from' => 'date|required',
                    'date_to' => 'date|required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/certificates/create/')->withInput()->withErrors($validator);
                }

                $file = null;

                if ($request->file('file') != null) {
                    $file = $request->file('file')->store('/certificates', 'public');
                } else {
                    // Стандартное действие
                }

                CryptoCertificate::create([
                    'serial_number' => $request->input('serial_number'),
                    'id_organization' => $request->input('id_organization'),
                    'id_user' => $request->input('id_user'),
                    'id_assignment' => $request->input('id_assignment'),
                    'file' => $file,
                    'date_from' => $request->input('date_from'),
                    'date_to' => $request->input('date_to'),
                ]);

                \Session::flash('success', 'Certificate added successfully');

                return redirect('/crypto/certificates');
            } else {

                $vars = [
                    'organizations' => CryptoOrganization::pluck('name', 'id'),
                    'users' => User::select(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name) AS name"),'id')->pluck('name', 'id'),
                    'assignments' => CryptoAssignment::pluck('name', 'id')
                ];
                return view('crypto.certificates.create', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.certificates.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'serial_number' => 'required',
                    'id_organization' => 'required',
                    'id_user' => 'required',
                    'id_assignment' => 'required',
                    'date_from' => 'date|required',
                    'date_to' => 'date|required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/crypto/certificates/edit/'.$id)->withInput()->withErrors($validator);
                }

                $certificate = CryptoCertificate::where('id','=', $id)->first();

                $file = $request->file('file');

                if ($file != null) {
                    $file = $request->file('file')->store('/certificates', 'public');
                    $certificate->file = $file;
                } else {
                    // Стандартное действие
                }

                $certificate->serial_number = $request->input('serial_number');
                $certificate->id_organization = $request->input('id_organization');
                $certificate->id_user = $request->input('id_user');
                $certificate->date_from = $request->input('date_from');
                $certificate->date_to = $request->input('date_to');
                $certificate->save();

                \Session::flash('success', 'Certificate edited successfully');

                return redirect('/crypto/certificates');
            } else {

                $certificate = CryptoCertificate::with(['user' => function($query){ $query->select('id', 'first_name', 'last_name', 'middle_name');}])
                    ->with(['organization' => function($query){ $query->select('id', 'name');}])
                    ->with(['assignment' => function($query){ $query->select('id', 'name');}])->where('id','=', $id)->first();

                if ($certificate != null) {

                    $vars = [
                        'certificate' => $certificate,
                        'id' => $id,
                        'organizations' => CryptoOrganization::pluck('name', 'id'),
                        'users' => User::select(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name) AS name"),'id')->pluck('name', 'id'),
                        'assignments' => CryptoAssignment::pluck('name', 'id')
                    ];
                    return view('crypto.certificates.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.certificates.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
