<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'selectedVote',
        'teacherId'
    ];

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
}