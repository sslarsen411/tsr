<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\GoogleSocialiteController;


Route::view('/home', 'pages.home')->name('pages.home');
Route::view('/nogo', 'pages.nogo')->name('pages.nogo');
Route::get('/admin/',  function(){abort(403);});

Route::get('/', [ClientController::class, 'showCorrectPage'])->name('pages.start');
Route::view('/start', 'pages.start')->name('pages.start');
Route::view('/register', 'pages.register')->name('pages.register');

/* Sign in a visitor */
Route::controller(CustomerController::class)->group( function(){
    Route::post('/initialize', 'initialize')->name('initialize');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
  });

  /* Google Oauth2 sign in  */
Route::controller(GoogleSocialiteController::class)->group( function(){
  Route::get('auth/google', 'redirectToGoogle')->name('google.redirect');  // redirect to google login
  Route::get('callback/google', 'handleCallback')->name('google.callback');    // callback route after google account chosen
});
/* RE

  /* REVIEW PROCESS*/
Route::get('/rate',  function(Request $request){return view('pages.rate',['request'=> $request]);})->name('pages.rate');
Route::view('/instr', 'instr')->name('instructions');
Route::view('/care', 'care')->name('care');
  
/* SITE POLICIES */
Route::prefix('policies')->group(function () {
    Route::view('/cookie', 'cookie')->name('cookie');
    Route::view('/privacy', '/policies/privacy')->name('privacy');
    Route::view('/terms', '/policies/tos')->name('terms');
});
