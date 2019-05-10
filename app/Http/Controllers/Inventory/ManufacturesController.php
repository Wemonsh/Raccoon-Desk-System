<?php

namespace App\Http\Controllers\Inventory;

use App\InvManufactures;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ManufacturesController extends Controller
{
    public function index() {

        return view('inventory.manufactures.index');
    }

    public function apiResponse (Request $request) {
        // получаем значения из request
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        // Сортировка
        if (empty($sortName)) {
            $sortName = 'id';
        }
        // Выбор данных и пагинация
        $rows = InvManufactures::orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

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
                'logotype' => 'image',
            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('/inventory/manufactures/create')->withInput()->withErrors($validator);
            }

            $logotype = null;

            if ($request->file('logotype') != null) {
                $logotype = $request->file('logotype')->store('/logotypes', 'public');
            } else {
                // Стандартная картинка
            }

            InvManufactures::create(
                [
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'logotype' => $logotype,
                ]
            );

            \Session::flash('success', 'Manufacturer added successfully');

            return redirect('/inventory/manufactures');

        } else if ($request->isMethod('get')) {
            return view('inventory.manufactures.create');
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.manufactures.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'logotype' => 'image',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/manufactures/edit/'.$id)->withInput()->withErrors($validator);
                }

                $manufacture = InvManufactures::where('id','=', $id)->first();

                $manufacture->name = $request->input('name');
                $manufacture->description = $request->input('description');

                if ($request->file('logotype') != null) {
                    $logotype = $request->file('logotype')->store('/logotype', 'public');
                    $manufacture->logotype = $logotype;
                }

                $manufacture->save();

                \Session::flash('success', 'Manufacture edited successfully');

                return redirect('/inventory/manufactures/');
            } else {
                $manufacture = InvManufactures::where('id','=', $id)->first();
                if ($manufacture != null) {
                    $vars = [
                        'manufacture' => $manufacture,
                        'id' => $id,
                    ];
                    return view('inventory.manufactures.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.manufactures.edit');
        } else {
            abort(404);
        }
    }
}
