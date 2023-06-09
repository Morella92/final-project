<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class TeacherController extends Controller
{
    public function index(){

        $results = Teacher::with('specializations.teachers', 'user.teacher', 'votes.teachers',  'sponsorships.teachers', 'review.teachers' )->get();
        

        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }

    public function show($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        if ($teacher) {
            return response()->json([
                'success' => true,
                'teacher' => $teacher,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Spiacente, ma non sono stati trovati insegnati',
            ]);
         }
    }




}