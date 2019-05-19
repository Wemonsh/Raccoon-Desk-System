<?php

namespace App\Http\Controllers\Inventory;

use App\InvMovement;
use App\InvPlacements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function movement() {

        $vars = [
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

        if ($id_placements != null && $date_from != null && $date_to != null && $radio == 3) {
//            $rows = InvMovement::with('placementFrom')->with('placementTo')->with(['inventory' => function ($query) {
//                $query->with('device');
//            }])
//                ->where('id_placement_from', '=', $id_placements)
//                ->orWhere('id_placement_to', '=', $id_placements)
////            ->where('id_inventory', 'LIKE', '%'.$searchText.'%')
////            ->where([['id_responsible', '!=', null],['id_responsible', '=', $request['id_responsible']]])
//                ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();





            $rows = InvMovement::with('placementFrom')->with('placementTo')->with(['inventory' => function ($query) use ($searchText) {
                $query->with(['device' => function ($query) use ($searchText) {
                    $query->where('name', 'LIKE', '%'.$searchText.'%');
                }]);
            }])
                ->where('created_at', '>=', $date_from)
                ->where('created_at', '<=', $date_to)
                ->where('id_placement_from', '=', $id_placements)
                ->orWhere('id_placement_to', '=', $id_placements)
//                ->where([['created_at', '>=', $date_from],['created_at', '<=', $date_to]])
//            ->where('id_inventory', 'LIKE', '%'.$searchText.'%')
//            ->where([['id_responsible', '!=', null],['id_responsible', '=', $request['id_responsible']]])
                ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();






//            $rows = DB::select(DB::raw('SELECT
//	inv_movement_history.id,
//	inv_movement_history.id_inventory,
//	inv_movement_history.id_placement_to,
//	inv_movement_history.`comment`,
//	inv_inventories.id,
//	inv_inventories.id_device,
//	inv_inventories.inventory_number,
//	inv_devices.id,
//	inv_devices.`name`,
//	inv_movement_history.created_at,
//	inv_movement_history.id_placement_from,
//	inv_placements.id
//FROM
//	inv_movement_history
//	INNER JOIN inv_inventories ON inv_movement_history.id_inventory = inv_inventories.id
//	INNER JOIN inv_devices ON inv_inventories.id_device = inv_devices.id
//	INNER JOIN inv_placements ON inv_movement_history.id_placement_to = inv_placements.id
//	AND inv_movement_history.id_placement_from = inv_placements.id
//WHERE
//	inv_movement_history.id_placement_from = '.$id_placements.'
//	OR inv_movement_history.id_placement_to = '.$id_placements.'
//	AND inv_devices.`name` LIKE '.$searchText.''));


            $rows = InvMovement::join('inv_placements', [['inv_movement_history.id_placement_from', '=', 'inv_placements.id'], ['inv_movement_history.id_placement_to', '=', 'inv_placements.id']])
//                ->join('inv_placements', 'inv_movement_history.id_placement_to', '=', 'inv_placements.id')
                ->join('inv_inventories', 'inv_movement_history.id_inventory', '=', 'inv_inventories.id')
                ->join('inv_devices', 'inv_inventories.id_device', '=', 'inv_devices.id')
                ->select('inv_movement_history.id', 'inv_movement_history.created_at', 'inv_movement_history.id_placement_from', 'inv_movement_history.id_placement_to', 'inv_movement_history.comment', 'inv_devices.id as device_id', 'inv_devices.name as device_name', 'inv_placements.name as placement_name_from', 'inv_placements.name as placement_name_to', 'inv_inventories.inventory_number')
                ->where('inv_movement_history.id_placement_from', '=', $id_placements)
                ->orWhere('inv_movement_history.id_placement_to', '=', $id_placements)
                ->where('inv_devices.name', 'LIKE', '%'.$searchText.'%')
                ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();


//            $news = News::join('users', 'news.id_user', '=', 'users.id')
//                ->select('news.id', 'news.title', 'news.created_at', 'news.views', 'users.first_name', 'users.last_name', 'users.middle_name', 'users.id as id_user')
//                ->where('news.title', 'LIKE', '%'.$value.'%')->orderBy('created_at', 'desc')->paginate(5);



//            $rows = InvMovement::with('placementFrom')->with('placementTo')->with(['inventory' => function ($query) use ($searchText) {
//                $query->with('device')->where('name', 'LIKE', '%'.$searchText.'%');
//            }])->where('id_placement_from', '=', $id_placements)->orWhere('id_placement_to', '=', $id_placements)
////            ->where('id_inventory', 'LIKE', '%'.$searchText.'%')
////            ->where([['id_responsible', '!=', null],['id_responsible', '=', $request['id_responsible']]])
//                ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();
        } else {


//            $rows = InvMovement::join('inv_placements', 'inv_movement_history.id_placement_from', '=', 'inv_placements.id')
////                ->join('inv_placements', 'inv_movement_history.id_placement_to', '=', 'inv_placements.id')
//                ->join('inv_inventories', 'inv_movement_history.id_inventory', '=', 'inv_inventories.id')
//                ->join('inv_devices', 'inv_inventories.id_device', '=', 'inv_devices.id')
//                ->select('inv_movement_history.id', 'inv_movement_history.created_at', 'inv_movement_history.id_placement_from', 'inv_movement_history.id_placement_to', 'inv_movement_history.comment')
////                ->where('inv_devices.name', 'LIKE', '%'.$searchText.'%')
//                ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();







            $rows = InvMovement::with('placementFrom')->with('placementTo')->with(['inventory' => function ($query) {
                $query->with('device');
            }])->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();
        }



//        if ($request['placements'] == null) {
//            $rows = InvMovement::with('placementFrom')->with('placementTo')->with(['inventory' => function ($query) {
//                $query->with('device');
//            }])->where('id_inventory', 'LIKE', '%'.$searchText.'%')
//            ->where([['id_placement_from', '!=', null],['id_placement_from', '=', $request['placements']]])
//                ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();
//        }

        //$rows->inventory->device->where('name', 'LIKE', '%'.$searchText.'%');
        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}
