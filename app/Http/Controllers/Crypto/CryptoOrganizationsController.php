<?php

namespace App\Http\Controllers\Crypto;

use App\CryptoOrganization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoOrganizationsController extends Controller
{
    public function index () {

        return view('crypto.organizations.index');
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
        $rows = CryptoOrganization::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function show ($id) {
        $organization = CryptoOrganization::where("id", '=', $id)->first();
        $organization->address = json_decode($organization->address);
        $vars = [
            'organization' => $organization
        ];

        return view('crypto.organizations.show', $vars);
    }

    public function create (Request $request) {
        if (view()->exists('crypto.organizations.create')) {
            if ($request->isMethod('post')) {
                $json = null;
                $address = $request->input('address');

                if ($address != null) {
                    $address_info[] = array (
                        'street_house_office' => $address[0],
                        'sity' => $address[1],
                        'district' => $address[2],
                        'region' => $address[3],
                        'country' => $address[4],
                        'postcode' => $address[5],
                    );

                    $json = json_encode($address_info);
                }

                CryptoOrganization::create([
                    'name' => $request->input('name'),
                    'address' => $json,
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'site' => $request->input('site')
                ]);

                return redirect('crypto/organizations');
            } else {
                return view('crypto.organizations.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.organizations.edit')) {
            if ($request->isMethod('post')) {
                $organization = CryptoOrganization::where('id','=', $id)->first();

                $address = $request->input('address');
                $json = null;
                if ($address != null) {
                    $address_info[] = array (
                        'street_house_office' => $address[0],
                        'sity' => $address[1],
                        'district' => $address[2],
                        'region' => $address[3],
                        'country' => $address[4],
                        'postcode' => $address[5],
                    );

                    $json = json_encode($address_info);
                }

                $organization->name = $request->input('name');
                $organization->address = $json;
                $organization->phone = $request->input('phone');
                $organization->email = $request->input('email');
                $organization->site = $request->input('site');
                $organization->save();

                return redirect('/crypto/organizations');
            } else {
                $organization = CryptoOrganization::where('id','=', $id)->first();

                if ($organization != null) {
                    $organization->address = json_decode($organization->address);
                    $vars = [
                        'organization' => $organization,
                        'id' => $id
                    ];
                    return view('crypto.organizations.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.organizations.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;

    }
}
