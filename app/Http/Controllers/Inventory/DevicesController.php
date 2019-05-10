<?php

namespace App\Http\Controllers\Inventory;

use App\InvDevices;
use App\InvManufactures;
use App\InvTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DevicesController extends Controller
{
    public function index () {

        return view('inventory.devices.index');
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
        $rows = InvDevices::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {

        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'id_manufacture' => 'required',
                'id_type' => 'required',
                'photo' => 'image',
            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('/inventory/devices/create/')->withInput()->withErrors($validator);
            }

            $manufactures = $request['manufactures'];
            $types = $request['types'];
            $name = $request['name'];
            $specifications = json_encode($request['specifications']);
            $photo = null;

            if ($request->file('photo') != null) {
                $photo = $request->file('photo')->store('/inventory/devices', 'public');
            }

            InvDevices::create([
                'id_manufacture' => $manufactures,
                'id_type' => $types,
                'name' => $name,
                'specifications' => $specifications,
                'photo' => $photo,
            ]);

            \Session::flash('success', 'Device added successfully');

            return redirect('/inventory/devices');
        }

        $manufactures = InvManufactures::pluck('name', 'id');
        $types = InvTypes::pluck('name', 'id');

        $vars = [
            'manufactures' => $manufactures,
            'types' => $types
        ];

        return view('inventory.devices.create', $vars);
    }

    public function getTypes(Request $request) {
        $types = InvTypes::select('properties')->where('id','=', $request['id'])->first();
        return response()->json($types);
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.devices.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'id_manufacture' => 'required',
                    'id_type' => 'required',
                    'photo' => 'image',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/devices/edit/'.$id)->withInput()->withErrors($validator);
                }

                $type = InvDevices::where('id','=', $id)->first();

                $json = json_encode($request->input('specifications'));

                $type->name = $request->input('name');
                $type->id_manufacture = $request->input('manufactures');
                $type->id_type = $request->input('types');
                $type->specifications = $json;

                if ($request->file('photo') != null) {
                    $image = $request->file('photo')->store('/types', 'public');
                    $type->photo = $image;
                }

                $type->save();

                \Session::flash('success', 'Device edited successfully');

                return redirect('/inventory/devices/');
            } else {
                $device = InvDevices::where('id','=', $id)->first();
                if ($device != null) {
                    $vars = [
                        'device' => $device,
                        'manufactures' => InvManufactures::pluck('name', 'id'),
                        'types' => InvTypes::pluck('name', 'id'),
                        'id' => $id,
                    ];
                    return view('inventory.devices.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.devices.edit');
        } else {
            abort(404);
        }
    }
}
