<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\UploadController;
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

// Home
Route::get ( '/', action: [ 
    NavigationController::class,
    'home'
] )->name ( 'home' );

// Explore
Route::get ( '/explore', action: [ 
    NavigationController::class,
    'explore'
] )->name ( 'explore' );

// About Us
Route::get ( '/about_us', action: [ 
    NavigationController::class,
    'about_us'
] )->name ( 'about_us' );

// Sign Up
Route::get ( '/signup', action: [ 
    NavigationController::class,
    'signup'
] )
    ->name ( 'signup' )
    ->middleware ( 'guestx' );

Route::post (
    '/signup',
    [ 
        RegistrationController::class,
        'register'
    ]
)
    ->name ( 'register' )
    ->middleware ( 'guestx' );

// Sign In
Route::get ( '/signin', action: [ 
    NavigationController::class,
    'signin'
] )
    ->name ( 'signin' )
    ->middleware ( 'guestx' );

Route::post (
    '/signin',
    [ 
        LoginController::class,
        'signin'
    ]
)
    ->name ( 'login' )
    ->middleware ( 'guestx' );

// Sign Out
Route::post (
    '/signout',
    [ 
        LoginController::class,
        'signout'
    ]
)->name ( 'logout' );

// Model View
// Route::get (
//     '/model',
//     [ 
//         NavigationController::class,
//         'model_view'
//     ]
// )->name ( 'model_view' );

Route::get (
    '/model/{id?}',
    [ 
        NavigationController::class,
        'model_view'
    ]
)->name ( 'model_view' );

// Captcha
Route::get (
    'contact-form-captcha',
    [ 
        CaptCaptchaValidationController::class,
        'index'
    ]
);

Route::post (
    'captcha-validation',
    [ 
        CaptchaValidationController::class,
        'capthcaFormValidate'
    ]
);

Route::get (
    'reload-captcha',
    [ 
        CaptchaValidationController::class,
        'reloadCaptcha'
    ]
);

// Dashboard User
Route::get (
    'dashboard_user',
    [ 
        NavigationController::class,
        'dashboard_user'
    ]
)
    ->name ( 'dashboard_user' )
    ->middleware ( 'auth' );

Route::get (
    'dashboard_user_uploads',
    [ 
        NavigationController::class,
        'dashboard_user_uploads'
    ]
)
    ->name ( 'dashboard_user_uploads' )
    ->middleware ( 'auth' );

Route::get (
    'dashboard_user_downloads',
    [ 
        NavigationController::class,
        'dashboard_user_downloads'
    ]
)
    ->name ( 'dashboard_user_downloads' )
    ->middleware ( 'auth' );

Route::get (
    'dashboard_user_favorites',
    [ 
        NavigationController::class,
        'dashboard_user_favorites'
    ]
)
    ->name ( 'dashboard_user_favorites' )
    ->middleware ( 'auth' );

Route::get (
    'upload',
    [ 
        NavigationController::class,
        'upload_file'
    ]
)
    ->name ( 'upload_file' )
    ->middleware ( 'auth' );

Route::post (
    'upload',
    [ 
        UploadController::class,
        'store'
    ]
)
    ->name ( 'upload_the_file' )
    ->middleware ( 'auth' );

Route::post (
    'thumbnailUpload',
    [ 
        UploadController::class,
        'thumbnailUpload'
    ]
)
    ->name ( 'thumbnailUpload' )
    ->middleware ( 'auth' );

Route::get (
    'test',
    [ 
        NavigationController::class,
        'test'
    ]
)
    ->name ( 'test' );

Route::get (
    '/fetchExploreModel',
    [ 
        ModelController::class,
        'fetchExploreModel'
    ]
)
    ->name ( 'fetchExploreModel' );

Route::get (
    '/fetchUploadModels',
    [ 
        ModelController::class,
        'fetchUploadModels'
    ]
)
    ->name ( 'fetchUploadModels' )
    ->middleware ( 'auth' );

Route::get (
    '/fetchDownloadModels',
    [ 
        ModelController::class,
        'fetchDownloadModels'
    ]
)
    ->name ( 'fetchDownloadModels' )
    ->middleware ( 'auth' );

Route::get (
    '/fetchFavoriteModels',
    [ 
        ModelController::class,
        'fetchFavoriteModels'
    ]
)
    ->name ( 'fetchFavoriteModels' )
    ->middleware ( 'auth' );

Route::post (
    '/addFavorite/{id}',
    [ 
        ModelController::class,
        'addFavorite'
    ]
)
    ->name ( 'addFavorite' )
    ->middleware ( 'auth' );

Route::post (
    '/removeFavorite/{id}',
    [ 
        ModelController::class,
        'removeFavorite'
    ]
)
    ->name ( 'removeFavorite' )
    ->middleware ( 'auth' );

Route::post (
    '/toggleLike/{id}',
    [ 
        ModelController::class,
        'toggleLike'
    ]
)
    ->name ( 'toggleLike' )
    ->middleware ( 'auth' );

Route::post (
    '/downloadModel',
    [ 
        ModelController::class,
        'downloadModel'
    ]
)
    ->name ( 'downloadModel' );

Route::get (
    '/searchModelsExplore',
    [ 
        ModelController::class,
        'searchModelsExplore'
    ]
)
    ->name ( 'searchModelsExplore' );