<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/',[ListingController::class, 'index']);
Route::post('/listings',[ListingController::class, 'store']);

Route::get('/listings/create',[ListingController::class, 'create']);

Route::get('/listings/{listing}',[ListingController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
