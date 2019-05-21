<?php

namespace App\Http\Controllers\Inventory;

use App\InvInventories;
use App\InvMovement;
use App\InvPlacements;
use App\InvTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function movement() {

        $vars = [
            'date_from' => Carbon::now()->startOfMonth()->format('Y-m-d'),
            'date_to' => Carbon::now()->endOfMonth()->format('Y-m-d'),
            'placements' => InvPlacements::orderBy('name', 'asc')->pluck('name', 'id'),
        ];

        return view('inventory.reports.movement', $vars);
    }

    public function movementReportApiResponse (Request $request) {
        // получаем значения из request
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];
        $id_placements = $request['idPlacementFrom'];
        $date_from = $request['date_from'];
        $date_to = $request['date_to'];
        $radio = $request['radio'];

        // Сортировка
        if (empty($sortName)) {
            $sortName = 'id';
        }
        // Выбор данных и пагинация

        $rows = InvMovement::with('placementFrom')->with('placementTo')->with(['inventory' => function ($query) {
            $query->with('device');
        }]);

        if ($request->has('date_from') && $request->has('date_to')) {
            $rows->where('created_at','>=', $date_from)->where('created_at','<=', $date_to);
        }

        if ($request->has('searchText')) {
            $rows->whereHas('inventory', function ($query) use ($searchText) {
                $query->whereHas('device', function ($query) use ($searchText) {
                    $query->where('name', 'LIKE', '%'.$searchText.'%');
                });
            });
        }

        if ($id_placements != "" && $id_placements != null) {
            switch ($radio) {
                case 1:
                    $rows->where('id_placement_from','=', $id_placements);
                    break;
                case 2:
                    $rows->where('id_placement_to','=', $id_placements);
                    break;
                case 3:
                    $rows->where('id_placement_from','=', $id_placements)->orWhere('id_placement_to','=', $id_placements);
                    break;
            }
        }

        $rows = $rows->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function incoming() {

        $vars = [
            'date_from' => Carbon::now()->startOfMonth()->format('Y-m-d'),
            'date_to' => Carbon::now()->endOfMonth()->format('Y-m-d'),
            'types' => InvTypes::orderBy('name', 'asc')->pluck('name', 'id'),
        ];

        return view('inventory.reports.incoming', $vars);
    }

    public function incomingPropertyReportApiResponse (Request $request) {
        // получаем значения из request
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];
        $id_types = $request['id_types'];
        $date_from = $request['date_from'];
        $date_to = $request['date_to'];

        // Сортировка
        if (empty($sortName)) {
            $sortName = 'id';
        }
        // Выбор данных и пагинация

        $rows = InvInventories::with('counterparty')->with('device')->with('placement')->with('responsible')->with('status')->with('operator')
            ->where('cancelled', '!=', '1')->orWhere('cancelled', '=', null);

        if ($id_types != "" && $id_types != null) {
            $rows->whereHas('device', function ($query) use ($id_types) {
                $query->whereHas('type', function ($query) use ($id_types) {
                    $query->where('id', '=', $id_types);
                });
            });
        }

        if ($request->has('date_from') && $request->has('date_to')) {
            $rows->where('date_arrival','>=', $date_from)->where('date_arrival','<=', $date_to);
        }

        $rows = $rows->where('serial_number', 'LIKE', '%'.$searchText.'%');

        $rows = $rows->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }

    public function writtenOff() {

        $vars = [
            'date_from' => Carbon::now()->startOfMonth()->format('Y-m-d'),
            'date_to' => Carbon::now()->endOfMonth()->format('Y-m-d'),
            'types' => InvTypes::orderBy('name', 'asc')->pluck('name', 'id'),
        ];

        return view('inventory.reports.writtenoff', $vars);
    }

    public function writtenOffPropertyReportApiResponse (Request $request) {
        // получаем значения из request
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];
        $id_types = $request['id_types'];
        $date_from = $request['date_from'];
        $date_to = $request['date_to'];

        // Сортировка
        if (empty($sortName)) {
            $sortName = 'id';
        }
        // Выбор данных и пагинация

        $rows = InvInventories::with('counterparty')->with('device')->with('placement')->with('responsible')->with('status')->with('operator')
            ->where('cancelled', '=', '1');

        if ($request->has('date_from') && $request->has('date_to')) {
            $rows->where('date_arrival','>=', $date_from)->where('date_arrival','<=', $date_to);
        }

        if ($id_types != "" && $id_types != null) {
            $rows->whereHas('device', function ($query) use ($id_types) {
                $query->whereHas('type', function ($query) use ($id_types) {
                    $query->where('id', '=', $id_types);
                });
            });
        }

        $rows = $rows->where('serial_number', 'LIKE', '%'.$searchText.'%');

        $rows = $rows->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}
