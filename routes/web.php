<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;


// Livello 0
Route::get('/', [PublicController::class, 'showHome'])
        ->name('home');

Route::get('/catalogo', [PublicController::class, 'showCatalogo'])
        ->name('catalogo');

Route::get('/aziende', [PublicController::class, 'showAziende'])
        ->name('aziende');

Route::view('/faq', 'faq')
        ->name('faq');

Route::view('/contattaci', 'contattaci')
        ->name('contattaci');

//Livello1

Route::get('/user', [UserController::class, 'userarea'])
        ->name('user');

 Route::get('/user/usermodify', [UserController::class, 'modificaUtente'])
      ->name('usermodify');


//Livello2
Route::get('/staff', [StaffController::class, 'staffarea'])
        ->name('staff');

Route::get('/staff/staffmodify', [StaffController::class, 'modificaStaff'])
        ->name('staffmodify');

Route::get('/staff/offermodify', [StaffController::class, 'modificaOfferta'])
        ->name('offermodify');

//Livello3
Route::get('/admin', [AdminController::class, 'adminarea'])
        ->name('admin');

Route::get('/admin/adminmodify', [AdminController::class, 'modificaAdmin'])
        ->name('adminmodify');

Route::get('/admin/managecompany', [AdminController::class, 'gestioneAzienda'])
        ->name('managecompany');

require __DIR__.'/auth.php';