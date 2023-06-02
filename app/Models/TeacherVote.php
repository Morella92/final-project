<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherVote extends Model
{
    use HasFactory;

    protected $table = 'teacher_voter';

    protected $primaryKey = ['teacher_id', 'vote_id'];

    public $timestamps = false;

    protected $fillable = [
        'vote_id',
        'teacher_id'
    ];

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }


}