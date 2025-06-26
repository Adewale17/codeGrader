<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeCorrectionController;
use Illuminate\Support\Facades\Route;

// Guest Routes (For Unauthenticated Users Only)
Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Authenticated User Routes (For Logged-In Users Only)
Route::middleware(['auth'])->group(function () {
    Route::view('/submit-code', 'submit-code')->name('submit-code');
    Route::view('/howitworks', 'howitworks')->name('howitworks');
    Route::get('/history', [CodeCorrectionController::class, 'history'])->name('code.history');
    Route::delete('history/{id}', [CodeCorrectionController::class, 'delete'])->name('history.destroy');
});
// Public Route (Accessible to Everyone)
Route::view('/', 'index')->name('index');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::post('/analyze-code', [HuggingFaceController::class, 'analyzeCode'])->name('submit.code');
// Route::post('/submit-code', [OpenAIController::class, 'processCode']);

Route::post('/api/correct-code', [CodeCorrectionController::class, 'correctCode'])->name('submit.code');
