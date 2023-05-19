<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function specializations(){
        return $this->belongsToMany(Specialization::class);
    }

    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }

    public function votes(){
        return $this->belongsToMany(Vote::class);
    }
}