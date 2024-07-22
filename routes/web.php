<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\TrackingUpdateController;
use App\Http\Controllers\CompanySettingsController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PublicTrackingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/track/{tracking_number}', [PublicTrackingController::class, 'show'])->name('public.track');



// Protected routes
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Shipments
    Route::resource('shipments', ShipmentController::class);

    // Tracking Updates
    Route::get('/shipments/{shipment}/tracking-updates/create', [TrackingUpdateController::class, 'create'])->name('tracking-updates.create');
    Route::post('/shipments/{shipment}/tracking-updates', [TrackingUpdateController::class, 'store'])->name('tracking-updates.store');
    Route::delete('/tracking-updates/{trackingUpdate}', [TrackingUpdateController::class, 'destroy'])->name('tracking-updates.destroy');

    // Company Settings
    Route::get('/company/settings', [CompanySettingsController::class, 'edit'])->name('company.settings');
    Route::put('/company/settings', [CompanySettingsController::class, 'update'])->name('company.update');
    Route::put('/company/tracking-page', [CompanySettingsController::class, 'updateTrackingPage'])->name('company.update-tracking-page');

    // User Management (typically for admin users only)
    Route::middleware(['can:manage-users'])->group(function () {
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
    });

    // API tokens (if using Laravel Sanctum for API authentication)
    Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
    Route::post('/user/api-tokens', [ApiTokenController::class, 'store'])->name('api-tokens.store');
    Route::delete('/user/api-tokens/{token}', [ApiTokenController::class, 'destroy'])->name('api-tokens.destroy');


// Fallback route for 404 errors
Route::fallback(function () {
    return view('errors.404');
});
