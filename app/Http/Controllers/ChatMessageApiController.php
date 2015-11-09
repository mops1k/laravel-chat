<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatUsersOnline;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChatMessageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $messages = Rooms::find($id)
            ->messages()
            ->orderBy('created_at','DESC')
            ->paginate(50)
        ;

        return view('chat.read_window',[
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $chatMessage = new ChatMessage([
            "message" => $request->message,
            "user_id" => \Auth::user()->id
        ]);

        $room = Rooms::find($id);
        $room->messages()->saveMany([
            $chatMessage
        ]);

        return $chatMessage->toJson();
    }

    public function update_online($id, ChatUsersOnline $chatUsersOnline)
    {
        $user = $chatUsersOnline->query()
            ->where('room_id','=',$id)
            ->where('user_id','=',\Auth::user()->id)
            ->delete();

        $user = new ChatUsersOnline([
            'room_id'       => $id,
            'user_id'       => \Auth::user()->id,
            'last_activity' => Carbon::now()
        ]);

        $user->save();

        $online = Rooms::find($id)
            ->users()
            ->whereRaw("last_activity between \"".Carbon::now()->subMinute(5)."\" and \"".Carbon::now()."\"")
            ->get()
        ;
        $users = null;


        foreach ($online as $key => $item) {
            $users[$key] = $item->user->toArray();
            $users[$key]['last_activity'] = $item->last_activity;
        }

        return json_encode($users);
    }

    public function delete_online(ChatUsersOnline $chatUsersOnline)
    {
        $online = $chatUsersOnline->query()
            ->where('user_id','=',\Auth::user()->id)
            ->delete();

        return $online;
    }
}
