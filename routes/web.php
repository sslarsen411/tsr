<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\GoogleSocialiteController;


Route::view('/home', 'pages.home')->name('pages.home');
Route::view('/nogo', 'pages.nogo')->name('pages.nogo');
Route::get('/admin/',  function(){abort(401);});
Route::view('/admin/prompts', "pages.prompts")->name('admin.prompts');
Route::post('/admin/doPrompt', [AdminController::class,"doPrompt"])->name('admin.doprompt');

Route::get('/', [ClientController::class, 'showCorrectPage'])->name('index');
Route::view('/start', 'pages.start')->name('pages.start');
Route::view('/register', 'pages.register')->name('pages.register');

/* Sign in a visitor */
Route::controller(CustomerController::class)->group( function(){
    Route::post('/initialize', 'initialize')->name('initialize');
    Route::post('/logout', 'logout')->name('logout');
  });
  /* Google Oauth2 sign in  */
Route::controller(GoogleSocialiteController::class)->group( function(){
  Route::get('auth/google', 'redirectToGoogle')->name('google.redirect');  // redirect to google login
  Route::get('callback/google', 'handleCallback')->name('google.callback');    // callback route after google account chosen
});
  /* REVIEW PROCESS*/
Route::view('/rate', 'pages.rate')->name('pages.rate');
Route::view('/instr', 'pages.instr')->name('pages.instr');
Route::view('/care', 'pages.care')->name('pages.care');
Route::view('/doReview', 'pages.doReview')->name('pages.doReview');
Route::controller(ReviewController::class)->group( function(){
  Route::get('/startQuestions', 'startQuestions')->name('startQuestions');
  Route::get('/question/',  'handleQuestion')->name('question');
  Route::post('/questions',  'handleQuestion')->name('questions');
  Route::get('/finish', 'composeReview')->name('finish');
});
/* SITE POLICIES */
Route::prefix('policies')->group(function () {
    Route::view('/cookie', 'cookie')->name('cookie');
    Route::view('/privacy', '/policies/privacy')->name('privacy');
    Route::view('/terms', '/policies/tos')->name('terms');
});
