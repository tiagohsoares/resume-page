<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ResumeController;

Route::get('/', [ResumeController::class , 'index']);
Route::get('/download',[ResumeController::class, 'download'])->name("resume.download");
