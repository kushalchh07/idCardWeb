<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdCardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});


Route::resource('/admin',AdminController::class);

// Route::resource('/idCard',IdCardController::class);


Route::get('/idCard', [IdCardController::class, 'index'])->name('idCard.index'); 

// Admin middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/idCard/create', [IdCardController::class, 'create'])->name('idCard.create'); 
    Route::post('/idCard', [IdCardController::class, 'store'])->name('idCard.store'); 
    Route::get('/idCard/{id}', [IdCardController::class, 'show'])->name('idCard.show'); 
    Route::get('/idCard/{id}/edit', [IdCardController::class, 'edit'])->name('idCard.edit');
    Route::put('/idCard/{id}', [IdCardController::class, 'update'])->name('idCard.update'); 
    Route::delete('/idCard/{id}', [IdCardController::class, 'destroy'])->name('idCard.destroy'); 
});
