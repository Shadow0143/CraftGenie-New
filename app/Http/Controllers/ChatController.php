<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\Chat;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submitChats(Request $request)
    {
        // dd($request->all());
        $chat = new Chat();
        $chat->payment_id  = $request->order_id;
        $chat->package_id  = $request->package_id;
        $chat->sender  = Auth::user()->id;
        $chat->message  = $request->message;
        $chat->status  = 'unread';
        $chat->save();

        $newChat = Chat::select('chats.*', 'users.name')->leftjoin('users', 'users.id', '=', 'chats.sender')->where('chats.id', $chat->id)->first();

        $data = ' <div class=""mt-5>  <p class="pt-2">' . $newChat->message . '</p>
        <span style="font-size:10px"> By : ' . $newChat->name . ' &nbsp;
            ' . $newChat->created_at->diffForHumans() . ' </span> </div>';

        return \Response::json(['success' => true, 'data' => $data]);

        // return 1;
    }

    public function allChats(Request $request)
    {
        $chats = Chat::select('chats.*', 'users.name', 'users.id as uid')->leftjoin('users', 'users.id', '=', 'chats.sender')->where('payment_id', $request->id)->get();
        $chatsresult = '';
        foreach ($chats as $key => $val) {
            if ($val->uid == Auth::user()->id) {

                $chatsresult .= '<div class=" mychat ">';
            } else {
                $chatsresult .= '<div class=" otherchat ">';
            }
            $chatsresult .= '
            <p class="pt-2 ">' . $val->message . '</p>';
            if ($val->uid == Auth::user()->id) {
                $chatsresult .= '<span class=" mychatdate">';
            } else {
                $chatsresult .= '<span class="otherchatdate">';
            }
            $chatsresult .= 'By : ' . $val->name . ' &nbsp;
                ' . $val->created_at->diffForHumans() . ' </span>
        </div>';
        }

        return $chatsresult;
    }
}
