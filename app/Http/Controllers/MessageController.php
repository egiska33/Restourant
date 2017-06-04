<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {

    public function create()
    {
        return view('contacts');
    }

    public function store(Request $request)
    {
//        dd($request);
        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('contacts')->with(['message' => 'Yours message sent to restourant chef']);
    }
}
