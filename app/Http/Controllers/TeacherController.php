<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Specialization;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



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
        $specializations = Specialization::all();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();

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
        $data['user_id'] = Auth::id();

        if($request->hasFile('image')){
            $cv_path = $storage::put('uploads', $data['image']);
            $data[$cv_path] = $cv_path;
        }

        if($request->hasFile('image')){
            $picture_path = $storage::put('uploads', $data['image']);
            $data[$picture_path] = $picture_path;
        }

        $new_teacher = Teacher::create($data);

        if($request->has('specializations')) {
            $new_teacher->specializations()->attach($request->specializations);
        }

        $validator = Validator::make($request->all(), [
            'specializations[]' => 'accepted',
        ]);

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

        $specializations = Specialization::orderBy('name', 'asc')->get(); 
  

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
        
        $data = $request->validated();

        $teacher->update($data);

        if($request->has('specializations')) {
            $teacher->specializations()->sync($request->specializations);
        };

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
        
        return to_route('teachers.index'); 
    }
}