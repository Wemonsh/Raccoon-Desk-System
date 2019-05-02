<?php

namespace App\Http\Controllers\Inventory;

use App\InvCounterparty;
use App\InvCounterpartyContracts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CounterpartyContractsController extends Controller
{
    public function index() {

        return view('inventory.contracts.index');
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
        $rows = InvCounterpartyContracts::with('counterparty')->where('name', 'LIKE', '%'.$searchText.'%')->orderBy($sortName, $sortOrder)->paginate($pageSize)->toArray();

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
                return Redirect::to('/inventory/counterparty-contracts/create')->withInput()->withErrors($validator);
            }

            $files = $request->file('files');
            $json = null;
            if ($files != null) {
                $array = [];
                $counter = 0;
                foreach ($files as $file) {
                    $array[$counter]['id'] = $counter;
                    $array[$counter]['path'] = $file->store('/contracts', 'public');
                    $array[$counter]['name'] = $file->getClientOriginalName();
                    $counter++;
                }
                $json = json_encode($array);
            }

            InvCounterpartyContracts::create(
                [
                    'number' => $request['number'],
                    'name' => $request['name'],
                    'date_from' => $request['date_from'],
                    'date_to' => $request['date_to'],
                    'valid' => $request->input('valid') == null? 0 : 1,
                    'comment' => $request['comment'],
                    'files' => $json,
                    'id_counterparty' => $request['id_counterparty'],
                ]
            );

            \Session::flash('success', 'Placement added successfully');

            return redirect('/inventory/counterparty-contracts');

        } else if ($request->isMethod('get')) {
            $counterparty = InvCounterparty::pluck('name', 'id');

            $vars = [
                'counterparty' => $counterparty,
            ];

            return view('inventory.contracts.create', $vars);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('inventory.contracts.edit')) {
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);

                if ($validator->fails()) {
                    \Session::flash('warning', 'Please enter the valid details');
                    return Redirect::to('/inventory/counterparty-contracts/edit/'.$id)->withInput()->withErrors($validator);
                }

                $contract = InvCounterpartyContracts::where('id','=', $id)->first();

                $files = $request->file('files');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/contracts', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $jsonDecode = json_decode($contract->files);
                    if ($jsonDecode != null) {
                        foreach ($array as $file) {
                            array_push($jsonDecode, $file);
                        }
                        $json = json_encode($jsonDecode);
                    } else {
                        $json = json_encode($array);
                    }
                    $contract->files = $json;
                }

                $contract->number = $request->input('number');
                $contract->name = $request->input('name');
                $contract->date_from = $request->input('date_from');
                $contract->date_to = $request->input('date_to');
                $contract->valid = $request->input('valid') == null? 0 : 1;
                $contract->comment = $request->input('comment');
                $contract->id_counterparty = $request->input('id_counterparty');
                $contract->save();

                \Session::flash('success', 'Placements added successfully');

                return redirect('/inventory/counterparty-contracts/');
            } else {
                $contract = InvCounterpartyContracts::where('id','=', $id)->first();
                $counterparty = InvCounterparty::pluck('name', 'id');
                if ($contract != null) {
                    $vars = [
                        'contract' => $contract,
                        'id' => $id,
                        'counterparty' => $counterparty,
                    ];
                    return view('inventory.contracts.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('inventory.contracts.edit');
        } else {
            abort(404);
        }
    }
}
