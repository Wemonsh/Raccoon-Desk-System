<?php

namespace App\Http\Controllers\crypto;

use App\CryptoInformationSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoInformationSystemController extends Controller
{
    public function index () {
        $info_systems = CryptoInformationSystem::orderBy('id', 'asc')->paginate(5);

        $vars = [
            'info_systems' => $info_systems
        ];

        return view('crypto.infosystems.index', $vars);
    }

    public function create (Request $request) {
        if (view()->exists('crypto.infosystems.create')) {
            if ($request->isMethod('post')) {

                CryptoInformationSystem::create([
                    'name' => $request->input('name'),
                    'comment' => $request->input('comment'),
                ]);

                return redirect('crypto');
            } else {
                return view('crypto.infosystems.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit (Request $request, $id) {
        if (view()->exists('crypto.infosystems.edit')) {
            if ($request->isMethod('post')) {
                $info_system = CryptoInformationSystem::where('id','=', $id)->first();

                $info_system->name = $request->input('name');
                $info_system->comment = $request->input('comment');
                $info_system->save();

                return redirect('crypto');
            } else {
                $info_system = CryptoInformationSystem::where('id','=', $id)->first();

                if ($info_system != null) {

                    $vars = [
                        'info_system' => $info_system,
                        'id' => $id
                    ];
                    return view('crypto.infosystems.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('crypto.infosystems.edit');
        } else {
            abort(404);
        }
    }

    public function delete () {
        echo __METHOD__;
    }
}
