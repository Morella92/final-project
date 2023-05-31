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
       // AUTORIZZAZIONI UTENTE
       if($message->teacher_id == Auth::id()){
        // dd($message);

        return view('messages.show', compact('message'));
    }else{
        return redirect()->route('dashboard')->with(['error' => 'Spiacente ma non sei autorizzato a visualizzare la pagina', 'error_expiry' => time() + 2]);
    }
    
        
     }
   

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
        $message->delete();

        return redirect()->route('messages.index')->with('alert-message', 'Moved to recycled bin')->with('alert-type', 'info');
    }

    public function restore($id)
    {
        Book::where('id', $id)->withTrashed()->restore();
        return redirect()->route('messages.index')->with('alert-message', "Restored successfully")->with('alert-type', 'success');
    }

    public function restoreAll()
        {
            Book::onlyTrashed()->restore();
            return redirect()->route('messages.index')->with('alert-message', "All messages restored successfully")->with('alert-type', 'success');
        }


    public function forceDelete($id)
        {
            Book::where('id', $id)->withTrashed()->forceDelete();
            return redirect()->route('messages.trashed')->with('alert-message', "Delete definitely")->with('alert-type', 'success');
        }
}