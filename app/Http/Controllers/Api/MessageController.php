<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        // recupero messaggi in base ad id
        $user_id = Auth::user()->id;
        $message = Message::where('teacher_id', $user_id)->orderBy('date_fake', 'desc')->get();


        $validatedData = $request->validate([
            'title' => 'required|string| max:100|min:1',
            'text' => 'required|string|min:5|max:3000',
            'ui_name' => 'required|string|min:2|max:50',
            'ui_email' => 'required|email|min:2|max:100',
            'ui_phone' => 'nullable|string|min:2|max:50',
            'date_fake' => 'nullable|date',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validatedData->errors()
            ]);
        }

        $message = new Message();
        $message->title = $validatedData['title'];
        $message->text = $validatedData['text'];
        $message->ui_name = $validatedData['ui_name'];
        $message->ui_email = $validatedData['ui_email'];
        $message->ui_phone = $validatedData['ui_phone'];
        $message->date_fake = $validatedData['date_fake'];
        $message->save();

        return response()->json([
            'success' => true,
            'message' => 'Messaggio salvato con successo'
        ]);
    }
}