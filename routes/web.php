<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))
        ->middleware('permission:view dashboard')
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | FRONT OFFICE / PELAYANAN MEDIS
    |--------------------------------------------------------------------------
    */

    // Patients
    Route::get('/patients', fn () => Inertia::render('Patients/Index'))
        ->middleware('permission:manage patients')
        ->name('patients.index');

    Route::get('/patients/create', fn () => Inertia::render('Patients/Create'))
        ->middleware('permission:manage patients')
        ->name('patients.create');

    // Visits
    Route::get('/visits', fn () => Inertia::render('Visits/Index'))
        ->middleware('permission:manage visits')
        ->name('visits.index');

    Route::get('/visits/create', fn () => Inertia::render('Visits/Create'))
        ->middleware('permission:manage visits')
        ->name('visits.create');

    // Medical Records
    Route::get('/medical-records/index', fn () => Inertia::render('MedicalRecords/Index'))
        ->middleware('permission:manage medical records')
        ->name('medical-records.index');

    Route::get('/medical-records/soap', fn () => Inertia::render('MedicalRecords/Soap'))
        ->middleware('permission:manage medical records')
        ->name('medical-records.soap');

    // IGD
    Route::get('/igd', fn () => Inertia::render('IGD/Index'))
        ->middleware('permission:manage visits')
        ->name('igd.index');

    Route::get('/igd/create', fn () => Inertia::render('IGD/Create'))
        ->middleware('permission:manage visits')
        ->name('igd.create');

    // Outpatient
    Route::get('/outpatient', fn () => Inertia::render('Outpatient/Index'))
        ->middleware('permission:manage visits')
        ->name('outpatient.index');

    Route::get('/outpatient/create', fn () => Inertia::render('Outpatient/Create'))
        ->middleware('permission:manage visits')
        ->name('outpatient.create');

    // Inpatient
    Route::get('/inpatient', fn () => Inertia::render('Inpatient/Index'))
        ->middleware('permission:manage visits')
        ->name('inpatient.index');

    Route::get('/inpatient/create', fn () => Inertia::render('Inpatient/Create'))
        ->middleware('permission:manage visits')
        ->name('inpatient.create');

    // Procedures
    Route::get('/procedures', fn () => Inertia::render('Procedures/Index'))
        ->middleware('permission:manage medical records')
        ->name('procedures.index');

    Route::get('/procedures/create', fn () => Inertia::render('Procedures/Create'))
        ->middleware('permission:manage medical records')
        ->name('procedures.create');


    /*
    |--------------------------------------------------------------------------
    | PENUNJANG
    |--------------------------------------------------------------------------
    */

    Route::get('/laboratory', fn () => Inertia::render('Laboratory/Index'))
        ->middleware('permission:manage medical records')
        ->name('laboratory.index');

    Route::get('/radiology', fn () => Inertia::render('Radiology/Index'))
        ->middleware('permission:manage medical records')
        ->name('radiology.index');

    Route::get('/pharmacy', fn () => Inertia::render('Pharmacy/Index'))
        ->middleware('permission:manage pharmacy')
        ->name('pharmacy.index');


    /*
    |--------------------------------------------------------------------------
    | KEUANGAN
    |--------------------------------------------------------------------------
    */

    Route::get('/finance/billing', fn () => Inertia::render('Finance/Billing'))
        ->middleware('permission:manage billing')
        ->name('finance.billing');

    Route::get('/finance/cashier', fn () => Inertia::render('Finance/Cashier'))
        ->middleware('permission:manage cashier')
        ->name('finance.cashier');

    Route::get('/finance/bpjs', fn () => Inertia::render('Finance/BPJSClaims'))
        ->middleware('permission:manage billing')
        ->name('finance.bpjs');

    Route::get('/finance/accounting', fn () => Inertia::render('Finance/Accounting'))
        ->middleware('permission:manage billing')
        ->name('finance.accounting');


    /*
    |--------------------------------------------------------------------------
    | HR / SDM
    |--------------------------------------------------------------------------
    */

    Route::get('/hr/employees', fn () => Inertia::render('HR/Employees'))
        ->middleware('permission:manage employees')
        ->name('hr.employees');

    Route::get('/hr/schedules', fn () => Inertia::render('HR/Schedules'))
        ->middleware('permission:manage employees')
        ->name('hr.schedules');

    Route::get('/hr/payroll', fn () => Inertia::render('HR/Payroll'))
        ->middleware('permission:manage payroll')
        ->name('hr.payroll');


    /*
    |--------------------------------------------------------------------------
    | LOGISTIK / INVENTORY
    |--------------------------------------------------------------------------
    */

    Route::get('/inventory', fn () => Inertia::render('Inventory/Index'))
        ->middleware('permission:manage inventory')
        ->name('inventory.index');

    Route::get('/assets', fn () => Inertia::render('Assets/Index'))
        ->middleware('permission:manage inventory')
        ->name('assets.index');

    Route::get('/suppliers', fn () => Inertia::render('Suppliers/Index'))
        ->middleware('permission:manage inventory')
        ->name('suppliers.index');


    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN / EKSEKUTIF
    |--------------------------------------------------------------------------
    */

    Route::get('/management/dashboard', fn () => Inertia::render('Management/Dashboard'))
        ->middleware('permission:view executive dashboard')
        ->name('management.dashboard');

    Route::get('/management/reports', fn () => Inertia::render('Management/Reports'))
        ->middleware('permission:view executive dashboard')
        ->name('management.reports');

    Route::get('/management/statistics', fn () => Inertia::render('Management/Statistics'))
        ->middleware('permission:view executive dashboard')
        ->name('management.statistics');


    /*
    |--------------------------------------------------------------------------
    | INTEGRASI
    |--------------------------------------------------------------------------
    */

    Route::get('/integration/bpjs', fn () => Inertia::render('Integration/BPJS'))
        ->middleware('permission:manage billing')
        ->name('integration.bpjs');

    Route::get('/integration/satusehat', fn () => Inertia::render('Integration/Satusehat'))
        ->middleware('permission:manage medical records')
        ->name('integration.satusehat');

    Route::get('/integration/antrian', fn () => Inertia::render('Integration/Antrian'))
        ->middleware('permission:manage visits')
        ->name('integration.antrian');

    Route::get('/integration/api', fn () => Inertia::render('Integration/Api'))
        ->middleware('permission:manage users')
        ->name('integration.api');


    /*
    |--------------------------------------------------------------------------
    | SYSTEM ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/system/users', fn () => Inertia::render('System/Users'))
        ->middleware('permission:manage users')
        ->name('system.users');

    Route::get('/system/roles', fn () => Inertia::render('System/Roles'))
        ->middleware('permission:manage roles')
        ->name('system.roles');

    Route::get('/system/audit-log', fn () => Inertia::render('System/AuditLog'))
        ->middleware('permission:manage roles')
        ->name('system.audit');

    Route::get('/system/master-data', fn () => Inertia::render('System/MasterData'))
        ->middleware('permission:manage roles')
        ->name('system.master');

    Route::get('/system/settings', fn () => Inertia::render('System/Settings'))
        ->middleware('permission:manage roles')
        ->name('system.settings');
});

require __DIR__.'/auth.php';
