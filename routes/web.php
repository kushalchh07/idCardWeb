<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdCardController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return redirect()->route('admin.index');
    return view('admin.dashboard');
});


Route::resource('/admin',AdminController::class);

// Route::resource('/idCard',IdCardController::class);


Route::get('/idCard', [IdCardController::class, 'index'])->name('idCard.index'); 
Route::get('/idCard/create', [IdCardController::class, 'create'])->name('idCard.create'); 

// Admin middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::post('/idCard', [IdCardController::class, 'store'])->name('idCard.store'); 
    Route::get('/idCard/{idCard}', [IdCardController::class, 'show'])->name('idCard.show'); 
    Route::get('/idCard/{idCard}/edit', [IdCardController::class, 'edit'])->name('idCard.edit');
    Route::put('/idCard/{id}', [IdCardController::class, 'update'])->name('idCard.update'); 
    Route::delete('/idCard/{idCard}', [IdCardController::class, 'destroy'])->name('idCard.destroy'); 
    Route::get('/generate-pdf/{id}',[PdfController::class,'generatePdf'])->name('print.pdf');
});


// Login ,Register
Route::get('/login',[AdminController::class,'loginForm'])->name('admin.login.form');
Route::post('/login',[AdminController::class,'loggedin'])->name('admin.loggedin');
Route::get('/register',[AdminController::class,'registerForm'])->name('admin.register.form');
Route::post('/register',[AdminController::class,'register'])->name('admin.register');
Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');
