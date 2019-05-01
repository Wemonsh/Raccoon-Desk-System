<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\InvCounterparty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CounterpartyController extends Controller
{
    public function index () {
        return view('inventory.counterparty.index');
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
        $rows = InvCounterparty::where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

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
                return Redirect::to('/inventory/counterparty/create')->withInput()->withErrors($validator);
            }

            InvCounterparty::create(
                [
                'name' => $request['name'],
                'tin' => $request['tin'],
                'code' => $request['code'],
                'tracking' => $request['tracking'],
                'comment' => $request['comment'],
                'purchase' => $request['purchase'],
                'sale' => $request['sale']
                ]
            );

            \Session::flash('success', 'Event added successfully');

            return redirect('/inventory/counterparty');

        } else if ($request->isMethod('get')) {
            return view('inventory.counterparty.create');
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.counterparty.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/counterparty/edit/'.$id)->withInput()->withErrors($validator);
                }

                $counterparty = InvCounterparty::where('id','=', $id)->first();

                $counterparty->name = $request->input('name');
                $counterparty->tin = $request->input('tin');
                $counterparty->code = $request->input('code');
                $counterparty->tracking = $request->input('tracking') == null? 0 : 1;
                $counterparty->comment = $request->input('comment');
                $counterparty->purchase = $request->input('purchase') == null? 0 : 1;
                $counterparty->sale = $request->input('sale') == null? 0 : 1;
                $counterparty->save();

                \Session::flash('success', 'Event added successfully');

                return redirect('/inventory/counterparty/');
            } else {
                $counterparty = InvCounterparty::where('id','=', $id)->first();
                if ($counterparty != null) {
                    $vars = [
                        'counterparty' => $counterparty,
                        'id' => $id,
                    ];
                    return view('inventory.counterparty.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.counterparty.edit');
        } else {
            abort(404);
        }
    }


}
