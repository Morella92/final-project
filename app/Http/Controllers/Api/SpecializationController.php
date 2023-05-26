<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        

        $results = Specialization::with('specialization:id,name', 'specialization.description','user')->orderBy('created_at', 'desc')->get();

        returnresponse()->json([
            'success'=> true,
            'results'=> $results,
        ]);
}
}