<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;

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