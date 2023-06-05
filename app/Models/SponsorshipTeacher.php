<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SponsorshipTeacher extends Model
{
    use HasFactory;
    protected $table = 'sponsorship_teacher';

    protected $fillable = [
        'teacher_id',
        'sponsorship_id',
        'inizio_sponsorizzazione',
    ];
}