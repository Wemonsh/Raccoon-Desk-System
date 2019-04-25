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
    public function index($id = null) {

        $rooms = SocialMessageRooms::where('users', '!=', null)->whereJsonContains('users', [Auth::user()->id])->get();


        foreach($rooms as $s){
            $s->load(['messages'=>function($query){
                return $query->with('sender', 'receiver')->orderBy('created_at','desc')->take(1);
            }]);
        }

        $messages = SocialMessages::where('id_room', '=', $id)->get();

        // получаем id пользователя которому шлем сообщение
        $id_receiver = null;
        foreach ($rooms as $room) {
            if ($room['id'] == $id) {
                $users = json_decode($room['users']);
                if ($users[0] != Auth::user()->id) {
                    $id_receiver = $users[0];
                } else {
                    $id_receiver = $users[1];
                }
            }
        }

        //dump($rooms->toArray());

        $vars = [
            'id_room' => $id,
            'id_user' => Auth::user()->id,
            'id_receiver' => $id_receiver,
            'rooms' => $rooms,
            'messages' => $messages
        ];

        return view('social.message.index', $vars);
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

                return redirect()->back();
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
