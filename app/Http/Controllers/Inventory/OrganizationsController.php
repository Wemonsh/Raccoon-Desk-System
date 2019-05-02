<?php

namespace App\Http\Controllers\Inventory;

use App\InvOrganizations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrganizationsController extends Controller
{
    public function index() {

        return view('inventory.organizations.index');
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
        $rows = InvOrganizations::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('/inventory/organizations/create')->withInput()->withErrors($validator);
            }

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

            InvOrganizations::create(
                [
                    'name' => $request['name'],
                    'address' => $json,
                ]
            );

            \Session::flash('success', 'Organization added successfully');

            return redirect('/inventory/organizations');

        } else if ($request->isMethod('get')) {
            return view('inventory.organizations.create');
        }
    }



    public function edit (Request $request, $id) {
        if (view()->exists('inventory.organizations.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/organizations/edit/'.$id)->withInput()->withErrors($validator);
                }

                $organization = InvOrganizations::where('id','=', $id)->first();

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
                $organization->save();

                \Session::flash('success', 'Organization added successfully');

                return redirect('/inventory/organizations/');
            } else {
                $organization = InvOrganizations::where('id','=', $id)->first();
                if ($organization != null) {
                    $organization->address = json_decode($organization->address);
                    $vars = [
                        'organization' => $organization,
                        'id' => $id,
                    ];
                    return view('inventory.organizations.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.organizations.edit');
        } else {
            abort(404);
        }
    }
}
