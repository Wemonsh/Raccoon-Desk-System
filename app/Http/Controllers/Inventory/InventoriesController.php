<?php

namespace App\Http\Controllers\Inventory;

use App\InvCounterparty;
use App\InvDevices;
use App\InvPlacements;
use App\InvStatuses;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InventoriesController extends Controller
{
    public function index () {
        return view('inventory.inventories.index');
    }

    public function create () {
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
