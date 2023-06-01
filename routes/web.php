<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CouponController;


// Livello 0
Route::get('/', [PublicController::class, 'showHome'])
        ->name('home');

Route::get('/catalogo', [PublicController::class, 'showCatalogo'])
        ->name('catalogo');

Route::get('/aziende', [PublicController::class, 'showAziende'])
        ->name('aziende');

Route::get('/faq', [PublicController::class, 'showFaq'])
        ->name('faq');

Route::view('/contattaci', 'contattaci')
        ->name('contattaci');

//Livello1

Route::get('/user', [UserController::class, 'userarea'])
        ->name('user')->middleware('can:isUser');

Route::get('/user/usermodify', [UserController::class, 'modificaUtente'])
        ->name('usermodify');

Route::post('/user/usermodify', [UserController::class, 'updateUtente']);

Route::get('/user/coupon/{offertaId}/{aziendaId}', [CouponController::class, 'showCoupon'])
    ->name('coupon');

//Livello2
Route::get('/staff', [StaffController::class, 'staffarea'])
        ->name('staff')->middleware('can:isStaff');

Route::get('/staff/staffmodify', [StaffController::class, 'modificaStaff'])
        ->name('staffmodify');

Route::post('/staff/staffmodify', [StaffController::class, 'updateStaff']);

Route::get('/staff/offermodify', [StaffController::class, 'visualizzaOfferte'])
        ->name('offermodify');

Route::get('/staff/offermodify/{offer_id}/modify', [StaffController::class, 'modificaOfferta'])
        ->name('modify');

Route::post('/user/usermodify/{offer_id}/modify', [StaffController::class, 'updateOfferta']);

Route::delete('/staff/offermodify/{offer_id}', [StaffController::class, 'eliminaOfferta'])
        ->name('eliminaoffer');


//Livello3
Route::get('/admin', [AdminController::class, 'adminarea'])
        ->name('admin')->middleware('can:isAdmin');

Route::get('/admin/adminmodify', [AdminController::class, 'modificaAdmin'])
        ->name('adminmodify');

Route::get('/admin/managecompany', [AdminController::class, 'gestioneAzienda'])
        ->name('managecompany');

Route::get('/admin/addcompany', [AdminController::class, 'addAzienda'])
        ->name('addcompany');

Route::post('/admin/addcompany', [AdminController::class, 'storeAzienda'])
        ->name('addcompany.store');

Route::get('/admin/managecompany/companymodify/{company_id}', [AdminController::class, 'modificaAzienda'])
        ->name('companymodify');

Route::post('/admin/managecompany/companymodify/{company_id}', [AdminController::class, 'updateAzienda']);

Route::delete('/admin/managecompany/{company_id}', [AdminController::class, 'eliminaAzienda'])
        ->name('deletecompany');

Route::get('/admin/deleteuser', [AdminController::class, 'showcancellaUtente'])
        ->name('deleteuser');

Route::delete('/admin/deleteuser/{user_id}', [AdminController::class, 'eliminaUtente'])
        ->name('elimina');

Route::get('/admin/managestaff', [AdminController::class, 'gestioneStaff'])
        ->name('managestaff');

Route::get('/admin/managefaq', [AdminController::class, 'gestioneFaq'])
        ->name('managefaq');

Route::get('/admin/managefaq/addFaq', [AdminController::class, 'aggiungiFaq'])
        ->name('addFaq');
        
Route::post('/admin/managefaq/addFaq', [AdminController::class, 'storeAddFaq']);
        
Route::get('/admin/stats', [AdminController::class, 'visualizzaStatistiche'])
        ->name('stats');

require __DIR__.'/auth.php';