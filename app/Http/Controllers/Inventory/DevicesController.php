<?php

namespace App\Http\Controllers\Inventory;

use App\InvDevices;
use App\InvManufactures;
use App\InvTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    public function index() {
        return view('inventory.devices.index');
    }

    public function create (Request $request) {

        if ($request->isMethod('POST')) {
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
}
