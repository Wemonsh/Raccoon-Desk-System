<?php

namespace App\Http\Controllers\Inventory;

use App\InvCounterparty;
use App\InvDevices;
use App\InvInventories;
use App\InvPlacements;
use App\InvStatuses;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class InventoriesController extends Controller
{
    public function index () {
        return view('inventory.inventories.index');
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
        $rows = InvInventories::with('counterparty')->with('device')->with('placement')->with('responsible')->with('status')->with('operator')
            ->where('serial_number', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function create (Request $request) {

        if ($request->isMethod('POST')) {
            InvInventories::create([
                'date_arrival' => $request['date_arrival'],
                'id_counterparty' => $request['id_counterparty'],
                'id_device' => $request['id_device'],
                'inventory_number' => $request['inventory_number'],
                'id_placement' => $request['id_placement'],
                'id_responsible' => $request['id_responsible'],
                'id_status' => $request['id_status'],
                'cost' => $request['cost'],
                'cost_current' => $request['cost_current'],
                'date_warranty' => $request['date_warranty'],
                'accounting_code' => $request['accounting_code'],
                'barcode' => null,
                'serial_number' => $request['serial_number'],
                'ip' => $request['ip'],
                'qr_code' => null,
                'cancelled' => $request['cancelled'],
                'id_operator' => Auth::user()->id,
                ]);

            return redirect('/inventory/inventories/');
        } else {
            $vars = [
                'counterparty' => InvCounterparty::pluck('name', 'id'),
                'devices' => InvDevices::pluck('name', 'id'),
                'placements' => InvPlacements::pluck('name', 'id'),
                'users' => User::select(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name) AS name"),'id')->pluck('name', 'id'),
                'statuses' => InvStatuses::pluck('name', 'id'),
            ];

            return view('inventory.inventories.create', $vars);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.inventories.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'serial_number' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/inventories/edit/'.$id)->withInput()->withErrors($validator);
                }

                $inventory = InvInventories::where('id','=', $id)->first();

                $inventory->date_arrival = $request->input('date_arrival');
                $inventory->id_counterparty = $request->input('id_counterparty');
                $inventory->id_device = $request->input('id_device');
                $inventory->inventory_number = $request->input('inventory_number');

                $inventory->id_placement = $request->input('id_placement');
                $inventory->id_responsible = $request->input('id_responsible');
                $inventory->id_status = $request->input('id_status');
                $inventory->cost = $request->input('cost');

                $inventory->cost_current = $request->input('cost_current');
                $inventory->date_warranty = $request->input('date_warranty');
                $inventory->accounting_code = $request->input('accounting_code');
                $inventory->barcode = $request->input('barcode');

                $inventory->serial_number = $request->input('serial_number');
                $inventory->ip = $request->input('ip');
                $inventory->qr_code = $request->input('qr_code');
                $inventory->cancelled = $request->input('cancelled') == null? 0 : 1;
                $inventory->id_operator = Auth::user()->id;

                $inventory->save();

                \Session::flash('success', 'Inventory added successfully');

                return redirect('/inventory/inventories/');
            } else {
                $inventory = InvInventories::where('id','=', $id)->first();
                $counterparty = InvCounterparty::pluck('name', 'id');
                $devices = InvDevices::pluck('name', 'id');
                $placements = InvPlacements::pluck('name', 'id');
                $responsible = User::select(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name) AS name"),'id')->pluck('name', 'id');
                $statuses = InvStatuses::pluck('name', 'id');
                $operators = User::select(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name) AS name"),'id')->pluck('name', 'id');
                if ($inventory != null) {
                    $vars = [
                        'inventory' => $inventory,
                        'id' => $id,
                        'counterparty' => $counterparty,
                        'devices' => $devices,
                        'placements' => $placements,
                        'responsible' => $responsible,
                        'statuses' => $statuses,
                        'operators' => $operators,
                    ];
                    return view('inventory.inventories.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.inventories.edit');
        } else {
            abort(404);
        }
    }

    public function workplace() {

        $vars = [
            'responsible' => User::select(DB::raw("CONCAT(last_name,' ',first_name,' ',middle_name) AS name"),'id')->orderBy('id', 'asc')->pluck('name', 'id'),
        ];
        return view('inventory.inventories.workplace', $vars);
    }

    public function workplaceApiResponse (Request $request) {
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
        $rows = InvInventories::with('counterparty')->with('device')->with('placement')->with('responsible')->with('status')->with('operator')
            ->where('serial_number', 'LIKE', '%'.$searchText.'%')
            ->where([['id_responsible', '!=', null],['id_responsible', '=', $request['id_responsible']]])
            ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}