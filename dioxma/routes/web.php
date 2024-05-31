<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\Vendor\VendorAuthController;
use App\Http\Controllers\Vendor\VendorDashboard;
use App\Http\Controllers\Vendor\Product\ProductController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function(){
        // Enregistrement User
    Route::get('/register',[UserAuthController::class,'register'])->name('user.register');
    Route::post('/handlregister',[UserAuthController::class, 'handregister'])->name('user.handregister');
    // Connexion User
    Route::get('/login',[UserAuthController::class, 'login'])->name('login');
    Route::post('handlogin',[UserAuthController::class, 'handlogin'])->name('user.handlogin');
});

Route::middleware('auth')->group(function(){
// Deconnexion
Route::get('/deconnexion',[UserAuthController::class,'deconnexion'])->name('user.deconnexion');

});

//Route pour les vendors
Route::prefix('vendor/account')->group(function(){

    Route::get('/register',[VendorAuthController::class, 'register'])->name('vendor.register');
    Route::post('/register',[VendorAuthController::class,'handregister'])->name('vendor.handregister');

    Route::get('/login',[VendorAuthController::class, 'login'])->name('vendor.login');
    Route::post('/login',[VendorAuthController::class,'handlogin'])->name('vendor.handlogin');
});
// Redirect Vendor connecte
Route::middleware('vendor_middleware')->prefix('vendor/dashboard')->group(function(){
    Route::get('/',[VendorDashboard::class, 'index'])->name('vendor.dashboard');

    Route::prefix('article')->group(function(){
        Route::get('/create',[ProductController::class,'create'])->name('article.create');
        Route::post('/create',[ProductController::class,'store'])->name('article.store');
        Route::get('/liste',[ProductController::class,'liste'])->name('article.liste');

    });


    Route::get('/deconnexion',[VendorDashboard::class,'deconnexion'])->name('vendor.deconnexion');

});
