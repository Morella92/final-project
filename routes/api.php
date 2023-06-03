<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\VoteController;
use App\Http\Controllers\Api\SponsorshipController;
use App\Http\Controllers\Api\SpecializationController;
use App\Http\Controllers\Api\TeacherVoteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teachers', [TeacherController::class, 'index']);

Route::get('/teachers/{id}', [TeacherController::class, 'show']);

Route::post('/contacts', [LeadController::class, 'store']);

Route::post('/messages', [MessageController::class, 'store']);

Route::post('/reviews', [ReviewController::class, 'store']);

Route::post('/votes', [VoteController::class, 'store']);

Route::get('/sponsorships', [SponsorshipController::class, 'index']);

Route::apiResource('teacher-votes', TeacherVoteController::class);