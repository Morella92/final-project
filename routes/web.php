<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Mail\NewLead;
use App\Models\Lead;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController as MessagesController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
 
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('teachers', TeacherController::class)->parameters(['teachers'=> 'teacher:id']);



    Route::name('messages.')->prefix('messages')->group(function () {
        Route::get('/trashed', [MessagesController::class, 'trashed'])->name('trashed');
        Route::post('/{message}/restore', [MessagesController::class, 'restore'])->name('restore');
        Route::delete('/{message}/force-delete', [MessagesController::class, 'forceDelete'])->name('force-delete');
        Route::post('/restore-all', [MessagesController::class, 'restoreAll'])->name('restore-all');
    });
    Route::delete('/messages', [MessagesController::class, 'destroyAll'])->name('messages.destroy.all');

    Route::resource('messages', MessagesController::class);
    Route::resource('reviews', ReviewController::class);
    
    Route::get('/new-lead-mail', function(){
        $lead = Lead::first();
        return new NewLead($lead);

  

    });

});

Route::post('/upload', [HomeController::class,'upload'])->name('ckeditor.upload');
require __DIR__.'/auth.php';