<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CouponController;


                                                        //LIVELLO 0

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

                                                        //LIVELLO 1

//AREA UTENTE
Route::get('/user', [UserController::class, 'userarea'])
        ->name('user')->middleware('can:isUser');

Route::get('/user/usermodify', [UserController::class, 'modificaUtente'])
        ->name('usermodify');

Route::post('/user/usermodify', [UserController::class, 'updateUtente']);

Route::get('/user/coupon/{offertaId}/{aziendaId}', [CouponController::class, 'showCoupon'])
    ->name('coupon');

                                                            //LIVELLO 2

//AREA STAFF
Route::get('/staff', [StaffController::class, 'staffarea'])
        ->name('staff')->middleware('can:isStaff');

Route::get('/staff/staffmodify', [StaffController::class, 'modificaStaff'])
        ->name('staffmodify');

Route::post('/staff/staffmodify', [StaffController::class, 'updateStaff']);

//GESTIONE OFFERTE
Route::get('/staff/offermodify', [StaffController::class, 'visualizzaOfferte'])
        ->name('offermodify');

Route::get('/staff/offermodify/{offer_id}/modify', [StaffController::class, 'modificaOfferta'])
        ->name('modify');

Route::post('/staff/offermodify/{offer_id}/modify', [StaffController::class, 'updateOfferta']);

Route::get('/staff/offermodify/addOffer', [StaffController::class, 'addOfferta'])
        ->name('addOffer');

Route::post('/staff/offermodify/addOffer', [StaffController::class, 'storeOfferta'])
        ->name('addOffer.store');

Route::delete('/staff/offermodify/{offer_id}', [StaffController::class, 'eliminaOfferta'])
        ->name('eliminaoffer');


                                                                //LIVELLO 3

//AREA ADMIN
Route::get('/admin', [AdminController::class, 'adminarea'])
        ->name('admin')->middleware('can:isAdmin');

//GESTIONE AZIENDE
Route::get('/admin/managecompany', [AdminController::class, 'gestioneAzienda'])
        ->name('managecompany');

Route::get('/admin/managecompany/addcompany', [AdminController::class, 'addAzienda'])
        ->name('addcompany');

Route::post('/admin/managecompany/addcompany', [AdminController::class, 'storeAzienda'])
        ->name('addcompany.store');

Route::get('/admin/managecompany/companymodify/{company_id}', [AdminController::class, 'modificaAzienda'])
        ->name('companymodify');

Route::post('/admin/managecompany/companymodify/{company_id}', [AdminController::class, 'updateAzienda']);

Route::delete('/admin/managecompany/{company_id}', [AdminController::class, 'eliminaAzienda'])
        ->name('deletecompany');

//CANCELLAZIONE UTENTI
Route::get('/admin/deleteuser', [AdminController::class, 'showcancellaUtente'])
        ->name('deleteuser');

Route::delete('/admin/deleteuser/{user_id}', [AdminController::class, 'eliminaUtente'])
        ->name('elimina');

//GESTIONE STAFF        
Route::get('/admin/managestaff', [AdminController::class, 'gestioneStaff'])
        ->name('managestaff');

Route::get('/admin/managestaff/addstaff', [AdminController::class, 'addStaff'])
        ->name('addstaff');

Route::post('/admin/managestaff/addstaff', [AdminController::class, 'storeStaff'])
        ->name('addstaff.store');

Route::delete('/admin/managestaff/{staff_id}', [AdminController::class, 'eliminaStaff'])
        ->name('eliminastaff');

Route::get('/admin/managestaff/editstaff/{staff_id}', [AdminController::class, 'modificaStaff'])
        ->name('editstaff');

Route::post('/admin/managestaff/editstaff/{staff_id}', [AdminController::class, 'updateStaff']);

//GESTIONE FAQ
Route::get('/admin/managefaq', [AdminController::class, 'gestioneFaq'])
        ->name('managefaq');

Route::get('/admin/managefaq/addFaq', [AdminController::class, 'aggiungiFaq'])
        ->name('addFaq');
        
Route::post('/admin/managefaq/addFaq', [AdminController::class, 'storeAddFaq']);

Route::get('/admin/managefaq/editFaq/{faq_id}', [AdminController::class, 'modificaFaq'])
        ->name('editFaq');

Route::post('/admin/managefaq/editFaq/{faq_id}', [AdminController::class, 'updateFaq']);

Route::delete('/admin/managefaq/{faq_id}', [AdminController::class, 'eliminaFaq'])
        ->name('eliminaFaq');
        
//VISUALIZZA STATISTICHE
Route::get('/admin/stats', [AdminController::class, 'visualizzaStatistiche'])
        ->name('stats');

Route::get('/admin/stats/get-coupon-count-offerta', [AdminController::class, 'getCouponCountOfferta'])
        ->name('get-coupon-count-offerta');

Route::get('/admin/stats/get-coupon-count-utente', [AdminController::class, 'getCouponCountUtente'])
        ->name('get-coupon-count-utente');

require __DIR__.'/auth.php';