<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recupero tutti i messaggi
        // $messaggi = Message::all();
    // return view('messages.index', compact('messaggi'));

        // recupero messaggi in base ad id
        $user_id = Auth::user()->id;
        $messages = Message::where('teacher_id', $user_id)->get();
        // dd($messaggi);

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
    // Recupero il messaggio in base all'ID e alla relazione con il teacher
    // $message = Auth::user()->teacher->message()->find($id);

    // if ($message) {
    //     return view('messages.show', compact('message'));
    // } else {
    //     $messageNotFound = "Nessun messaggio trovato.";
    //     return view('messages.show', compact('messageNotFound'));
    // }
    return view('messages.show', compact('message'));
        
     }
    // public function show($id)
    // {
    //     // Recupera il messaggio specifico in base all'ID
    //     $message = Message::findOrFail($id);

    //     // Passa il message alla vista 'messages.show'
    //     return view('messages.show', compact('message'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}