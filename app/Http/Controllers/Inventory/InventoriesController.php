<?php

namespace App\Http\Controllers\Inventory;

use App\InvCounterparty;
use App\InvDevices;
use App\InvInventories;
use App\InvPlacements;
use App\InvStatuses;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoriesController extends Controller
{
    public function index () {
        return view('inventory.inventories.index');
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
                'users' => User::select(DB::raw("CONCAT(first_name,' ',last_name,' ',middle_name) AS name"),'id')->pluck('name', 'id'),
                'statuses' => InvStatuses::pluck('name', 'id'),
            ];

            return view('inventory.inventories.create', $vars);
        }
    }
}
