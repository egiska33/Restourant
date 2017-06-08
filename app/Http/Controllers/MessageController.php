<?php

namespace App\Http\Controllers;

use App\Mail\MessageAccept;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller {

    public function create()
    {
        return view('contacts');
    }

    public function store(Request $request)
    {
        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        Mail::to('esivickas@gmail.com')->send(new MessageAccept($message));
        return redirect()->route('contacts')->with(['message' => 'Yours message sent to restourant chef']);
    }
}
