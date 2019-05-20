<?php

namespace App\Http\Controllers\Inventory;

use App\InvMovement;
use App\InvPlacements;
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

        dump($request);
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
            $rows->where('created_at','>=', $request->date_from)->where('created_at','<=', $request->date_to);
        }

        if ($request->has('searchText')) {
            $rows->whereHas('inventory', function ($query) use ($request) {
                $query->whereHas('device', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%'.$request->searchText.'%');
                });
            });

        }

        switch ($request->radio) {
            case 1:
                dump($request->radio);
                break;

            case 2:
                dump($request->radio);
                break;

            case 3:
                dump($request->radio);
                break;
        }


        $rows = $rows->paginate($pageSize)->toArray();

        //dump($rows);

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}
