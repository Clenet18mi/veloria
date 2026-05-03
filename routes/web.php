<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\BillingController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\SuperAdmin\TenantController;

// ...

Route::middleware(['auth', 'verified', 'role:super_admin'])->prefix('admin')->group(function () {
    Route::get('tenants', [TenantController::class, 'index'])->name('admin.tenants');
});
use App\Http\Middleware\EnsurePlanFeature;

// ...

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('reservations', ReservationController::class);
    Route::resource('billing', BillingController::class);
    Route::resource('maintenance', MaintenanceController::class)->middleware(EnsurePlanFeature::class.':maintenance');
    Route::resource('crm', CRMController::class)->middleware(EnsurePlanFeature::class.':crm');
    Route::resource('reports', \App\Http\Controllers\ReportController::class)->middleware(EnsurePlanFeature::class.':reports');
    
    // ...
});

require __DIR__.'/auth.php';
