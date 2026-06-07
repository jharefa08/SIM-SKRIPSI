<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    TitleSubmissionController,
    GuidanceSessionController,
    ExamRegistrationController,
    ThesisArchiveController,
    NotificationController,
    UserController,
    ProgressController,
    SupervisionController
};

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('titles', TitleSubmissionController::class);
    Route::post('/titles/{title}/review', [TitleSubmissionController::class, 'review'])->name('titles.review');

    Route::resource('guidances', GuidanceSessionController::class);
    Route::post('/guidances/{guidance}/review', [GuidanceSessionController::class, 'review'])->name('guidances.review');

    Route::resource('exams', ExamRegistrationController::class);
    Route::post('/exams/{exam}/verify', [ExamRegistrationController::class, 'verify'])->name('exams.verify');
    Route::post('/exams/{exam}/finish', [ExamRegistrationController::class, 'finish'])->name('exams.finish');

    Route::resource('archives', ThesisArchiveController::class);

    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::get('/progress/{student}', [ProgressController::class, 'show'])->name('progress.show');
    Route::get('/supervisions', [SupervisionController::class, 'index'])->name('supervisions.index');
    Route::get('/titles/{title}/approval-letter', [TitleSubmissionController::class, 'approvalLetter'])->name('titles.approvalLetter');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.readAll');
    Route::get('/notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');

    Route::middleware('role:jurusan')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
    });
    
});
