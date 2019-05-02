<?php

namespace App\Http\Controllers\Inventory;

use App\InvOrganizations;
use App\InvPlacements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlacementsController extends Controller
{
    public function index() {

        return view('inventory.placements.index');
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
        $rows = InvPlacements::with('organization')->where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

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
                return Redirect::to('/inventory/placements/create')->withInput()->withErrors($validator);
            }

            InvPlacements::create(
                [
                    'name' => $request['name'],
                    'comment' => $request['comment'],
                    'id_organization' => $request['id_organization'],
                ]
            );

            \Session::flash('success', 'Placement added successfully');

            return redirect('/inventory/placements');

        } else if ($request->isMethod('get')) {
            $organizations = InvOrganizations::pluck('name', 'id');

            $vars = [
                'organizations' => $organizations,
            ];

            return view('inventory.placements.create', $vars);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.placements.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/placements/edit/'.$id)->withInput()->withErrors($validator);
                }

                $placement = InvPlacements::where('id','=', $id)->first();

                $placement->name = $request->input('name');
                $placement->comment = $request->input('comment');
                $placement->id_organization = $request->input('id_organization');
                $placement->save();

                \Session::flash('success', 'Placements added successfully');

                return redirect('/inventory/placements/');
            } else {
                $placement = InvPlacements::where('id','=', $id)->first();
                $organizations = InvOrganizations::pluck('name', 'id');
                if ($placement != null) {
                    $vars = [
                        'placement' => $placement,
                        'id' => $id,
                        'organizations' => $organizations,
                    ];
                    return view('inventory.placements.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.placements.edit');
        } else {
            abort(404);
        }
    }
}
