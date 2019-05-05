<?php

namespace App\Http\Controllers\Inventory;

use App\InvTypes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    public function index () {

        return view('inventory.types.index');
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
        $rows = InvTypes::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

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
                return Redirect::to('/inventory/types/create')->withInput()->withErrors($validator);
            }

            $image = null;

            if ($request->file('image') != null) {
                $image = $request->file('image')->store('/types', 'public');
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

            \Session::flash('success', 'Type added successfully');

            return redirect('/inventory/types');

        } else if ($request->isMethod('get')) {
            return view('inventory.types.create');
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.types.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/types/edit/'.$id)->withInput()->withErrors($validator);
                }

                $type = InvTypes::where('id','=', $id)->first();

                $type->name = $request->input('name');
                $type->description = $request->input('description');
                $type->properties = $request->input('properties');

                if ($request->file('image') != null) {
                    $image = $request->file('image')->store('/types', 'public');
                    $type->image = $image;
                }

                $type->save();

                \Session::flash('success', 'Type added successfully');

                return redirect('/inventory/types/');
            } else {
                $type = InvTypes::where('id','=', $id)->first();
                if ($type != null) {
                    $vars = [
                        'type' => $type,
                        'id' => $id,
                    ];
                    return view('inventory.types.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.types.edit');
        } else {
            abort(404);
        }
    }

}
