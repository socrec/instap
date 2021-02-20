<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication routes
Auth::routes();
Route::group(
    [
        'as' => 'auth.',
        'prefix' => 'auth',
    ],
    function () {
        // Facebook OAuth
        Route::get('/facebook', [SocialController::class, 'facebookRedirect'])->name('facebook.login');
        Route::get('/facebook/callback', [SocialController::class, 'loginWithFacebook'])->name('facebook.callback');
    }
);

// Tap routes
Route::group(
    [
        'as' => 'tap.',
        'prefix' => 'tap',
    ],
    function () {
        Route::name('show')->get('/{id}', 'TapController@show')->whereNumber('id');

        Route::name('redirect-profile')->get('/{id}/edit', function () {
            return redirect(route('profile.index'));
        })->whereNumber('id');
    }
);

// User profile routes
Route::group(
    [
        'as' => 'profile.',
        'prefix' => 'profile',
        'middleware' => 'auth'
    ],
    function () {
        Route::name('index')->get('/', 'ProfileController@index');
        Route::name('edit')->get('/{id}/edit', 'ProfileController@edit')->whereNumber('id');
        Route::name('update')->put('/{id}', 'ProfileController@update')->whereNumber('id');
    }
);
