<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function(){
    Route::get('/register',[UserAuthController::class,'register'])->name('user.register');
    Route::post('/handlregister',[UserAuthController::class, 'handregister'])->name('user.handregister');

});
