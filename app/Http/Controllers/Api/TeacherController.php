<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(){

        $results = Teacher::with('specializations.teachers')->get();

        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }
}
