<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        // recupero messaggi in base ad id
        $user_id = Auth::user()->id;
        $messages = Message::where('teacher_id', $user_id)->orderBy('created_at', 'desc')->get();
        
        // CESTINO
        $trashed = Message::onlyTrashed()->get()->count();

        return view('messages.index', compact('messages', 'trashed'));
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
        $message = new Message();
        $message->teacher_id = $request->input('teacher_id');
        $message->message = $request->input('message');
        $message->title = $request->input('title');
        $message->text = $request->input('text');
        $message->ui_name = $request->input('ui_name');
        $message->ui_mail = $request->input('ui_email');
        $message->ui_phone = $request->input('ui_phone');
        $message->save();

    return redirect()->route('messages.index')->with('alert-message', 'Messaggio salvato con successo')->with('alert-type', 'success');
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
       if($message->user_id == Auth::id()){
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

    public function trashed()
    {

        $messages = Message::onlyTrashed()->get();
        return view('messages.trashed', compact('messages'));
    }

    public function restore($id)
    {
        Message::where('id', $id)->withTrashed()->restore();
        return redirect()->route('messages.index')->with('alert-message', "Restored successfully")->with('alert-type', 'success');
    }

    public function restoreAll()
        {
            Message::onlyTrashed()->restore();

            return redirect()->route('messages.index')->with('alert-message', "All messages restored successfully")->with('alert-type', 'success');
        }


    public function forceDelete($id)
        {
            Message::where('id', $id)->withTrashed()->forceDelete();
            return redirect()->route('messages.trashed')->with('alert-message', "Delete definitely")->with('alert-type', 'success');
        }


        public function destroyAll(Request $request)
        {
    
             $messages= Message::onlyTrashed()->forceDelete();
             $request->session()->flash('message', 'Il cestino è stato svuotato correttamente.');
            
    
             return to_route('messages.index');
        }
}