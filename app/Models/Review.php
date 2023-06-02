<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'userReview',
        'review',
        'teacher_id'
    ];

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }
}