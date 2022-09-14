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
        $chat->save();

        $newChat = Chat::select('chats.*', 'users.name')->leftjoin('users', 'users.id', '=', 'chats.sender')->where('chats.id', $chat->id)->first();

        $data = ' <p class="pt-2">' . $newChat->message . '</p>
        <span style="font-size:10px"> By : ' . $newChat->name . ' &nbsp;
            ' . $newChat->created_at->diffForHumans() . ' </span>';

        return \Response::json(['success' => true, 'data' => $data]);
    }
}