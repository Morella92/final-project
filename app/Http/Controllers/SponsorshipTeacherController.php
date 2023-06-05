<?php

namespace App\Http\Controllers;
use App\Models\Sponsorship;
use App\Models\SponsorshipTeacher;
use Illuminate\Http\Request;



class SponsorshipTeacherController extends Controller
{
    public function saveSponsorshipTeacher($userId, $sponsorshipId, $startDate)
{
    SponsorshipTeacher::updateOrCreate(
        ['teacher_id' => $teacherId],
        ['sponsorship_id' => $sponsorshipId, 'inizio_sponsorizzazione' => $startDate]
    );
}

}