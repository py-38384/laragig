<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;

Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

Route::get('/',[ListingController::class, 'index']);


Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

Route::post('/users',[UserController::class, 'store'])->middleware('guest');
Route::post('/users/authenticate',[UserController::class, 'authenticate'])->middleware('guest');

Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

Route::get('/register',[UserController::class, 'create'])->middleware('guest');
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');

Route::get('/listings/{listing}',[ListingController::class, 'show']);
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');
Route::delete('/listings/{listing}',[ListingController::class, 'terminate'])->middleware('auth');
Route::get('/listing/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');
