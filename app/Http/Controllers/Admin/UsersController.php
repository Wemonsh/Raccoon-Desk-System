<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {
        if (view()->exists('admin.users.index')) {

            $vars = [
                'users' => User::with('roles')->paginate(20)
            ];

            return view('admin.users.index', $vars);
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.users.edit')) {
            if ($request->isMethod('post')) {

                $user = User::where('id','=', $id)->first();

                $user->name = $request->input('name');
                $user->email = $request->input('email');

                $user->save();

                return redirect('/admin/users');
            } else {
                $user = User::where('id','=', $id)->first();
                if ($user != null) {
                    $vars = [
                        'user' => $user,
                        'id' => $id,
                    ];
                    return view('admin.users.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.users.edit');
        } else {
            abort(404);
        }
    }

    public function delete($id) {
        if ($id != null) {
            User::find($id)->delete();
        }

        return redirect('/admin/users');
    }

    public function recover($id) {
        if ($id != null) {
            User::onlyTrashed()->find($id)->restore();
        }

        return redirect('/admin/users');
    }

    public function deleted() {
        if (view()->exists('admin.users.deleted')) {

            $vars = [
                'users' => User::onlyTrashed()->paginate(20)
            ];
            return view('admin.users.deleted', $vars);
        } else {
            abort(404);
        }
    }
}
