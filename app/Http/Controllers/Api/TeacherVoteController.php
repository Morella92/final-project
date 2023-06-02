<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeacherVote;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'vote_id' => 'required|unsigned|between:1,5',
            'teacher_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }    

        $vote = new Vote();
        $vote->vote = $data['vote_id'];
        $vote->teacher_id = $data['teacher_id']; 
        $vote->save();

        return response()->json([
            'success' => true,
            'message' => 'Messaggio salvato con successo'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherVote  $teacherVote
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherVote $teacherVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherVote  $teacherVote
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherVote $teacherVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherVote  $teacherVote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherVote $teacherVote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherVote  $teacherVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherVote $teacherVote)
    {
        //
    }
}