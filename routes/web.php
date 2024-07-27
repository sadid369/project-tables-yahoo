<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/', [StudentController::class,'showStudents']);
Route::get('/union', [StudentController::class,'unionData']);
Route::get('/when', [StudentController::class,'whenData']);
Route::get('/chunk', [StudentController::class,'chunkData']);
