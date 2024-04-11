<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard_controller;
use App\Http\Controllers\InternshipOfferController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('home.home', [
        'success' => 'Email déjà utilisé',
    ]);
})->name('home.home');


Route::get('/confidentialite',
function () {

    return view('home.confidentialite');
       })->name('home.confidentialite');

Route::post('demande',[App\Http\Controllers\DemandeController::class,'dodemande'])->name('auth.store');
Route::get('demande',[App\Http\Controllers\DemandeController::class,'index'])->name('auth.demande');


Route::get('/auth/login',[App\Http\Controllers\AuthController::class,'login'])->name('auth.login');
Route::post('/auth/login', [App\Http\Controllers\AuthController::class,'dologin'])->name('dologin');
Route::get('/auth/unlogin',[App\Http\Controllers\AuthController::class,'unlogin'])->name('unlogin');


Route::get('/users', [Dashboard_controller::class, 'indexUser'])->name('users.index');
Route::put('/utilisateur/{user}', [Dashboard_controller::class, 'updateVisibility'])->name('utilisateur.updateVisibility');
Route::get('/users/{user}/edit', [Dashboard_controller::class, 'editUser'])->name('users.edit');
Route::put('/users/{user}', [Dashboard_controller::class, 'updateUser'])->name('users.updateUser');
Route::delete('/users/{user}', [Dashboard_controller::class, 'destroyUser'])->name('users.destroy');

Route::get('/users/create',[App\Http\Controllers\Dashboard_controller::class,'createUser'])->name('users.create');
Route::post('/users',[App\Http\Controllers\Dashboard_controller::class,'storeUser'])->name('users.storeUser');


Route::resource('/internship_offers', InternshipOfferController::class);
Route::post('/postuler',[InternshipOfferController::class,'postuler'])->name('postuler');
Route::get('/internship_offersMesOffres', [InternshipOfferController::class, 'indexOffer'])->name('internship_offers.MesOffres');


Route::post('/internship_offers-wishlist-store', [InternshipOfferController::class, 'storeWishlist'])->name('internship_offers.wishlist.store');
Route::delete('/internship_offers-wishlist-delete', [InternshipOfferController::class, 'destroyWishlist'])->name('internship_offers.wishlist.destroy');



Route::get('/company', [Dashboard_controller::class, 'indexCompany'])->name('company.index');
Route::get('/company/create', [Dashboard_controller::class, 'createCompany'])->name('company.create');
Route::post('/company-store-company', [Dashboard_controller::class, 'storeCompany'])->name('company.storeCompany');
Route::get('/company/{id}', [Dashboard_controller::class, 'show'])->name('company.show');
Route::get('/company/{company}/edit', [Dashboard_controller::class, 'edit'])->name('company.edit');
Route::put('/company/{company}', [Dashboard_controller::class, 'update'])->name('company.update');
Route::delete('/company/{company}', [Dashboard_controller::class, 'destroy'])->name('company.destroy');

Route::post('/company-store-note',[Dashboard_controller::class, 'storeNote'])->name('company.storeNote');

Route::get('/dashbord', [Dashboard_controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashbord/upload_cv', [Dashboard_controller::class, 'setCV'])->name('dashboard.upload_cv');

Route::get('/dashbord/download_cv', [Dashboard_controller::class, 'downloadCV'])->name('downloadCV');
Route::get('/back',function (){
return redirect(route('home.home'));

})->name('retour');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';