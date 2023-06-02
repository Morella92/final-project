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

        $validator =  Validator::make( $data, [
            'title' => 'required|string| max:100|min:1',
            'text' => 'required|string|min:5|max:3000',
            'ui_name' => 'required|string|min:2|max:50',
            'ui_email' => 'required|email|min:2|max:100',
            'ui_phone' => 'nullable|string|min:2|max:50',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        };

        $message = Message::create($data);

        return response()->json([
            'success' => true
        ]);
    }
}