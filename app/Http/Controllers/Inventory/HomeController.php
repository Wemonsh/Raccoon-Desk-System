<?php

namespace App\Http\Controllers\Inventory;

use App\InvCounterparty;
use App\InvDevices;
use App\InvManufactures;
use App\InvOrganizations;
use App\InvPlacements;
use App\InvTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {

        $vars = [
            'counterparty' => InvCounterparty::count(),
            'manufactures' => InvManufactures::count(),
            'types' => InvTypes::count(),
            'devices' => InvDevices::count(),
            'placements' => InvPlacements::count(),
            'organizations' => InvOrganizations::count(),
        ];

        return view('inventory.index', $vars);
    }
}
