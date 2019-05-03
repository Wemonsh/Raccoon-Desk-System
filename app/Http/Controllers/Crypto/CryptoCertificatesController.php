<?php

namespace App\Http\Controllers\crypto;

use App\CryptoAssignment;
use App\CryptoCertificate;
use App\CryptoOrganization;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

                return redirect('/crypto/certificates');
            } else {

                $vars = [
                    'organizations' => CryptoOrganization::pluck('name', 'id'),
                    // TODO Доработать вывод ФИО в селект!!!
                    'users' => User::pluck('last_name', 'id'),
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
                        // TODO Доработать вывод ФИО в селект!!!
                        'users' => User::pluck('last_name', 'id'),
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
