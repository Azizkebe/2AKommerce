<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAuthController;


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

// Route::prefix('user')->group(function(){


// });
