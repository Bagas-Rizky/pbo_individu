<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();

        return view('admin.message.index', compact('messages'));
    }

    public function destroy(Message $message) 
    {
        $message->delete();

        return redirect()->back()->with([
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        ]);
    }
}
