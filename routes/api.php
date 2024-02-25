<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\ExporterController;
use App\Http\Controllers\Api\SupportTypeController;
use App\Http\Controllers\Api\ExporterSupportsController;
use App\Http\Controllers\Api\SupportTypeSupportsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        Route::apiResource('ads', AdController::class);

        Route::apiResource('support-types', SupportTypeController::class);

        // SupportType Supports
        Route::get('/support-types/{supportType}/supports', [
            SupportTypeSupportsController::class,
            'index',
        ])->name('support-types.supports.index');
        Route::post('/support-types/{supportType}/supports', [
            SupportTypeSupportsController::class,
            'store',
        ])->name('support-types.supports.store');

        Route::apiResource('exporters', ExporterController::class);

        // Exporter Supports
        Route::get('/exporters/{exporter}/supports', [
            ExporterSupportsController::class,
            'index',
        ])->name('exporters.supports.index');
        Route::post('/exporters/{exporter}/supports', [
            ExporterSupportsController::class,
            'store',
        ])->name('exporters.supports.store');

        Route::apiResource('companies', CompanyController::class);

        Route::apiResource('cards', CardController::class);

        Route::apiResource('supports', SupportController::class);
    });
