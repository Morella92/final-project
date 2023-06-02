<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote',
        'teacher_id'
    ];

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
}
