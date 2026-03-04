<?php

use Illuminate\Support\Facades\Route;
use Core\Http\Controllers\Api\StatusController;
use Core\Http\Controllers\Api\HealthController;
use Core\Http\Controllers\Api\VersionController;

Route::middleware(['api', 'throttle:api'])
    ->prefix('api')
    ->group(function () {
        Route::get('/status', [StatusController::class, 'index']);
        Route::get('/health', [HealthController::class, 'index']);
        Route::get('/version', [VersionController::class, 'index']);
    });
