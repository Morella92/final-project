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
    //    UPLOAD CV
        if($request->hasFile('cv')){
           $cv = Storage::put('uploads', $data['cv']);
            $data['cv'] = $cv;
        }
// UPLOAD IMG DI PROFILO
        if($request->hasFile('picture')){
           $picture = Storage::put('uploads', $data['picture']);
            $data['picture'] = $picture;
        }

          // UPDATE PDF CV
          if($request->hasFile('pdf_cv')){
            $pdf_cv = Storage::put('uploads', $data['pdf_cv']);
             $data['pdf_cv'] = $pdf_cv;
             
            
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
        if($teacher->user_id == Auth::id()){

            return view('teachers.show', compact('teacher'));
        }else{
            return redirect()->route('dashboard')->with(['error' => 'Spiacente ma non sei autorizzato a visualizzare la pagina', 'error_expiry' => time() + 2]);

        }

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

        if($teacher->user_id == Auth::id()){

            return view('teachers.edit', compact('teacher', 'specializations'));
        }else{
            return redirect()->route('dashboard')->with(['error' => 'Spiacente ma non sei autorizzato a visualizzare la pagina', 'error_expiry' => time() + 2]);
        }
  

        
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

        //    UPDATE CV
        if($request->hasFile('cv')){
            $cv = Storage::put('uploads', $data['cv']);
             $data['cv'] = $cv;
             if($teacher->cv && Storage::exists($teacher->cv)){
                 //  elimino il vecchio cv
                 Storage::delete($teacher->cv);
             }
         }

         // UPDATE IMG DI PROFILO
         if($request->hasFile('picture')){
            $picture = Storage::put('uploads', $data['picture']);
             $data['picture'] = $picture;
             if($teacher->picture && Storage::exists($teacher->picture)){
                //  elimino la vecchi img di profilo
                Storage::delete($teacher->picture);
            }
         }

         // UPDATE PDF CV
         if($request->hasFile('pdf_cv')){
            $pdf_cv = Storage::put('uploads', $data['pdf_cv']);
             $data['pdf_cv'] = $pdf_cv;
             if($teacher->pdf_cv && Storage::exists($teacher->pdf_cv)){
                //  elimino il vecchio pdf del cv
                Storage::delete($teacher->picture);
            }
         }

        $teacher->update($data);

        if($request->has('specializations')) {
            $teacher->specializations()->sync($request->specializations);
        };


        if($teacher->user_id == Auth::id()){

            return to_route('teachers.show', $teacher);
        }else{
            return redirect()->route('dashboard')->with(['error' => 'Spiacente ma non sei autorizzato a visualizzare la pagina', 'error_expiry' => time() + 2]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {   

        if ($teacher->trashed()) {

           
            // prima di eliminare il teacher definitivamente elimino il file del cv che è stato caricato
            if($teacher->cv && Storage::exists($teacher->cv)){
                //  elimino il vecchio cv
                Storage::delete($teacher->cv);
            }

            if($teacher->cv && Storage::exists($teacher->cv)){
                //  elimino il vecchio cv
                Storage::delete($teacher->cv);
            }
            
            $teacher->forceDelete(); // eliminazione definitiva
        
        } else {
            $teacher->delete(); //eliminazione soft
        }


        $teacher->delete();

// AUTORIZZAZIONI UTENTE
        if($teacher->user_id == Auth::id()){

            return to_route('teachers.index');
        }else{
            return redirect()->route('dashboard')->with(['error' => 'Spiacente ma non sei autorizzato a visualizzare la pagina', 'error_expiry' => time() + 2]);
        }
        
    }
}