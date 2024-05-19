<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/',[CountryController::class, 'index'])->name('country');
Route::post('/storecountry',[CountryController::class, 'store'])->name('storecountry');
Route::get('/country/{slug}/edit',[CountryController::class,'edit'])->name('editcountry');
Route::put('/country/{slug}',[CountryController::class,'update'])->name('updatecountry');
Route::delete('/country/{slug}',[CountryController::class,'delete'])->name('deletecountry');
