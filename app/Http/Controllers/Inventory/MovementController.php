<?php

namespace App\Http\Controllers\Inventory;

use App\InvInventories;
use App\InvMovement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    public function move (Request $request) {
        $inventory = InvInventories::where('id','=',$request['id_inventory'])->first();

        InvMovement::create([
            'id_inventory' => $inventory->id,
            'id_placement_from' => $inventory->id_placement,
            'id_responsible_from' => $inventory->id_responsible,
            'id_placement_to' => $request['id_placement_to'],
            'id_responsible_to' => $request['id_responsible_to'],
            'id_operator' => Auth::user()->id,
            'comment' => $request['comment'],
        ]);

        $inventory->id_placement = $request['id_placement_to'];
        $inventory->id_responsible = $request['id_responsible_to'];
        $inventory->save();

        return redirect()->back();
    }

    public function moveApiResponse (Request $request) {
        // получаем значения из request
        $pageSize = $request['pageSize'];
        $sortName = $request['sortName'];
        $sortOrder = $request['sortOrder'];
        $searchText = $request['searchText'];
        // Сортировка
//        if (empty($sortName)) {
//            $sortName = 'id';
//        }
        // Выбор данных и пагинация

        $rows = InvMovement::paginate($pageSize)->toArray();

//        $rows = InvInventories::with('counterparty')->with('device')->with('placement')->with('responsible')->with('status')->with('operator')
//            ->where('serial_number', 'LIKE', '%'.$searchText.'%')
//            ->where([['id_responsible', '!=', null],['id_responsible', '=', $request['id_responsible']]])
//            ->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

        return response()->json(
            [
                'rows' =>  $rows['data'],
                'total' => $rows['total']
            ]
        );
    }
}
