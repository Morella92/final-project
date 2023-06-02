<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100|min:1',
            'text' => 'required|string|min:5|max:3000',
            'ui_name' => 'required|string|min:2|max:50',
            'ui_email' => 'required|email|min:2|max:100',
            'ui_phone' => 'nullable|string|min:2|max:50',
            'teacher_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }    

        $message = new Message();
        $message->title = $data['title'];
        $message->text = $data['text'];
        $message->ui_name = $data['ui_name'];
        $message->ui_email = $data['ui_email'];
        $message->ui_phone = $data['ui_phone'];
        $message->teacher_id = $data['teacher_id']; 
        $message->save();

        return response()->json([
            'success' => true,
            'message' => 'Messaggio salvato con successo'
        ]);
    }
}