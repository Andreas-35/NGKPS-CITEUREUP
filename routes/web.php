<?php

use App\Http\Controllers\ResidentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::resource('resident', ResidentsController::class);
Route::get('/resident',[ResidentsController::class, 'index']);
Route::get('/resident/create',[ResidentsController::class, 'create']);
Route::get('/resident/{id}',[ResidentsController::class, 'edit']);
Route::post('/resident',[ResidentsController::class, 'store']);
Route::put('/resident/{id}',[ResidentsController::class, 'update']);
Route::delete('/resident/{id}',[ResidentsController::class, 'delete']);
