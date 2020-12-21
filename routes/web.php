<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

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


Route::group(
    [
        'as' => 'tap.',
        'namespace' => 'App\Http\Controllers\Tap',
        'prefix' => 'tap',
    ],
    function () {
        Route::name('show')->get('/{id}', 'TapController@show')->whereNumber('id');
    }
);
