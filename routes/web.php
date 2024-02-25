<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ExporterController;
use App\Http\Controllers\SupportTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('ads', AdController::class);
        Route::resource('support-types', SupportTypeController::class);
        Route::resource('exporters', ExporterController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('cards', CardController::class);
        Route::resource('supports', SupportController::class);
        Route::get('profile', [
            \App\Http\Controllers\ProfileController::class,
            'show',
        ])->name('profile.show');
        Route::put('profile', [
            \App\Http\Controllers\ProfileController::class,
            'update',
        ])->name('profile.update');
    });
