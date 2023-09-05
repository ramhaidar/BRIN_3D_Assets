<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CaptchaValidationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get ( '/', function ()
// {
//     return view ( 'welcome' );
// } );

Route::get ( '/', action: [ 
    NavigationController::class,
    'home'
] )->name ( 'home' );

Route::get ( '/explore', action: [ 
    NavigationController::class,
    'explore'
] )->name ( 'explore' );

Route::get ( '/about_us', action: [ 
    NavigationController::class,
    'about_us'
] )->name ( 'about_us' );

Route::get ( '/signup', action: [ 
    NavigationController::class,
    'signup'
] )->name ( 'signup' );

Route::post (
    '/signup',
    [ 
        RegistrationController::class,
        'register'
    ]
)->name ( 'register' );

Route::get ( '/signin', action: [ 
    NavigationController::class,
    'signin'
] )->name ( 'signin' );

Route::post (
    '/signin',
    [ 
        LoginController::class,
        'login'
    ]
)->name ( 'login' );

Route::post (
    '/logout',
    [ 
        LoginController::class,
        'logout'
    ]
)->name ( 'logout' );

Route::get ( '/model', action: [ 
    NavigationController::class,
    'model_view'
] )->name ( 'model_view' );

// CAPTCHA ROUTES
Route::get ( 'contact-form-captcha', [ CaptchaValidationController::class, 'index' ] );
Route::post ( 'captcha-validation', [ CaptchaValidationController::class, 'capthcaFormValidate' ] );
Route::get ( 'reload-captcha', [ CaptchaValidationController::class, 'reloadCaptcha' ] );
/// END CAPTCHA ROUTES
