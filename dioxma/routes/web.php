<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\Vendor\VendorAuthController;
use App\Http\Controllers\Vendor\VendorDashboard;
use App\Http\Controllers\Vendor\Product\ProductController;
use App\Http\Controllers\Vendor\Product\PaiementController;
use App\Http\Controllers\Vendor\Product\UserPaymentController;
use App\Http\Controllers\WebsiteController;
// use App\Http\Controllers\StatusController;


Route::get('/',[WebsiteController::class,'index'])->name('welcome');

Route::middleware('guest')->group(function(){
        // Enregistrement User
    Route::get('/register',[UserAuthController::class,'register'])->name('user.register');
    Route::post('/handlregister',[UserAuthController::class, 'handregister'])->name('user.handregister');
    // Connexion User
    Route::get('/login',[UserAuthController::class, 'login'])->name('login');
    Route::post('handlogin',[UserAuthController::class, 'handlogin'])->name('user.handlogin');
});

Route::middleware('auth')->group(function(){

    Route::get('/product/order/{id}',[UserPaymentController::class,'initPayment'])->name('order.payment');

// Deconnexion
    Route::get('/deconnexion',[UserAuthController::class,'deconnexion'])->name('user.deconnexion');

    Route::get('/detail/product/{id}',[ProductController::class, 'detail_product'])->name('detail.product');
    Route::get('/add_cart/{id}/',[ProductController::class,'add_cart'])->name('add_cart.product');
    Route::get('/show_cart',[ProductController::class,'show_cart'])->name('show_cart.product');
    Route::get('/delete_cart/{id}',[ProductController::class,'delete_cart'])->name('delete_cart.product');
    Route::get('/cash_delivery',[ProductController::class, 'cash_delivery'])->name('cash_delivery');

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
        Route::get('edit/{article}',[ProductController::class,'edit'])->name('article.edit');
        // Route::get('edit/{article}',[ProductController::class,'edit'])->name('article.edit');
        Route::put('update/{article}',[ProductController::class,'update'])->name('article.update');
        Route::get('delete/{article}',[ProductController::class,'delete'])->name('article.delete');
        Route::get('/delete/{path_image}',[ProductController::class,'destroy_image'])->name('image.delete');
        Route::get('/update/status/{id}',[ProductController::class, 'update_status'])->name('article.status');

    });
    Route::prefix('paiement')->group(function(){
        Route::get('/create',[PaiementController::class, 'index'])->name('config.create');
        Route::post('/handcreate',[PaiementController::class, 'store'])->name('config.store');
        Route::get('/commande',[PaiementController::class,'commande'])->name('vendor.commande');
        Route::get('/livraison/{commande}',[PaiementController::class,'livraison'])->name('commande.livraison');

        // Route::get('/cash_delivery',[PaiementController::class, 'cash_delivery'])->name('cash_delivery');

    });
    // Route::prefix('status')->group(function(){
    //     Route::get('/create',[StatusController::class, 'create'])->name('stat.create');
    //     // Route::get('/active/{id}',[StatusController::class,'update_status'])->name('stat.update');
    // });

    Route::get('/deconnexion',[VendorDashboard::class,'deconnexion'])->name('vendor.deconnexion');

});
