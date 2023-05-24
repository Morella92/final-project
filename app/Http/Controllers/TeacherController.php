<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Specialization;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $teachers = Teacher::all();
        $specializations= Specialization::all();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations= Specialization::all();
        return view('teachers.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {   
        $data = $request->validated();

        // if ($request->hasFile('image')) {
        //     $cover_path = Storage::put('uploads', $data['image']);
        //     $data['cover_image'] = $cover_path;
        // }
        $data['user_id'] = Auth::id();

        $new_teacher= Teacher::create($data);

        return to_route('teachers.show', $new_teacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {   

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $specializations = Specialization::all(); 
        // $specialization= Specialization:::orderBy('name', 'asc')->get();::orderBy('name', 'asc')->get();
  

        return view('teachers.edit', compact('teacher', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {   
        $data = $request->all();

        $teacher->update($data);

        return to_route('teachers.show', $teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {   
        $teacher->delete();
        
        return back(); 
    }
}