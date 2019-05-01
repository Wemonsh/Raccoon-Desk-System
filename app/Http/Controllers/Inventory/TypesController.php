<?php

namespace App\Http\Controllers\Inventory;

use App\InvTypes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    public function index (Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('/inventory/types/create')->withInput()->withErrors($validator);
            }

            $image = null;

            if ($request->file('image') != null) {
                $image = $request->file('image')->store('/image', 'public');
            } else {
                // Стандартная картинка
            }

            $properties = json_encode(explode(',', $request['properties']));

            InvTypes::create(
                [
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'properties' => $properties,
                    'image' => $image,
                ]
            );

            \Session::flash('success', 'Manufacturer added successfully');

            return redirect('/inventory/types');

        } else if ($request->isMethod('get')) {
            return view('inventory.types.index');
        }
    }

    public function apiResponse () {

    }

    public function create () {
        return view('inventory.types.create');
    }

    public function edit () {
        return view('inventory.types.edit');
    }

}
