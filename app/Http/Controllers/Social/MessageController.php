<?php

namespace App\Http\Controllers\social;

use App\SocialMessageRooms;
use App\SocialMessages;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;
use function Psy\debug;

class MessageController extends Controller
{
    public function index() {
        return view('social.message.index');
    }

    public function send(Request $request) {
        if (view()->exists('social.message.send')) {
            if ($request->isMethod('post')) {

                $files = $request->file('file');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/messages', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $json = json_encode($array);
                }

                $room = null;
                // Образцы запросов поиска в JSON
                //$room = SocialMessageRooms::where('users', '!=', null)->whereJsonContains('users', ['id_sender' => Auth::user()->id])->whereJsonContains('users', ['id_receiver' => $request->input('id_receiver')])->get()->first();
                //$room = SocialMessageRooms::where('users', '!=', null)->where('users->id_sender', Auth::user()->id)->where('users->id_receiver', $request->input('id_receiver'))->get()->first();

                $room = SocialMessageRooms::where('users', '!=', null)->whereJsonContains('users', [Auth::user()->id])->whereJsonContains('users', [(int)$request->input('id_receiver')])->get()->first();

                if ($room == null) {
                    $array = [];
                    array_push($array, Auth::user()->id, (int)$request->input('id_receiver'));
                    $room = SocialMessageRooms::create([
                        'users' => json_encode($array),
                    ]);
                }

                SocialMessages::create([
                    'message' => $request->input('message'),
                    'files' => $json,
                    'id_room' => $room->id,
                    'id_sender' => Auth::user()->id,
                    'id_receiver' => $request->input('id_receiver'),
                ]);

                return redirect('social/message/send');
            } else {

                $users = User::select('id','first_name','last_name','middle_name')->where('id', '!=', Auth::user()->id)->get()->toArray();

                $vars = [
                    'users' => $users
                ];
                return view('social.message.send', $vars);
            }
        } else {
            abort(404);
        }
    }

}
