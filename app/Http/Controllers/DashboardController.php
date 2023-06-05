<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teacher = $user->teacher;
    
        $labels = Message::where('teacher_id', $teacher->id)
            ->selectRaw('CONCAT(MONTH(created_at), "/", YEAR(created_at)) as label')
            ->distinct()
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->pluck('label');
    
        $data = Message::where('teacher_id', $teacher->id)
            ->selectRaw('COUNT(id) as count')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->pluck('count');
    
        return view('bar-chart', compact('labels', 'data'));
    }
    public function showBarChart()
    {
        // Recupera i dati necessari per il grafico a barre
        $user = Auth::user();
    
        $labels = Message::join('teachers', 'messages.teacher_id', '=', 'teachers.id')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('CONCAT(MONTH(messages.created_at), "/", YEAR(messages.created_at)) as label')
            ->distinct()
            ->orderByRaw('YEAR(ANY_VALUE(messages.created_at)), MONTH(ANY_VALUE(messages.created_at))')
            ->groupBy('label')
            ->pluck('label');
    
        $data = Message::join('teachers', 'messages.teacher_id', '=', 'teachers.id')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->selectRaw('COUNT(messages.id) as count, CONCAT(MONTH(messages.created_at), "/", YEAR(messages.created_at)) as label')
            ->groupBy('label')
            ->orderByRaw('YEAR(ANY_VALUE(messages.created_at)), MONTH(ANY_VALUE(messages.created_at))')
            ->pluck('count');
    
        // Passa i dati alla vista 'bar-chart'
        return view('bar-chart', compact('labels', 'data'));
    }
    


}