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
| AUTH DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED AREA (SIMRS CORE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // =========================
    // PROFILE
    // =========================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =========================
    // FRONT OFFICE / PELAYANAN MEDIS
    // =========================

    // Master Pasien
    Route::get('/patients', fn () => Inertia::render('Patients/Index'))->name('patients.index');

    // Kunjungan
    Route::get('/visits', fn () => Inertia::render('Visits/Index'))->name('visits.index');
    Route::get('/visits/create', fn () => Inertia::render('Visits/Create'))->name('visits.create');

    // Rekam Medis
    Route::get('/medical-records/index', fn () => Inertia::render('MedicalRecords/Index'))->name('medical-records.index');
    Route::get('/medical-records/soap', fn () => Inertia::render('MedicalRecords/Soap'))->name('medical-records.soap');

    // IGD
    Route::get('/igd', fn () => Inertia::render('IGD/Index'))->name('igd.index');

    // Rawat Jalan
    Route::get('/outpatient', fn () => Inertia::render('Outpatient/Index'))->name('outpatient.index');

    // Rawat Inap
    Route::get('/inpatient', fn () => Inertia::render('Inpatient/Index'))->name('inpatient.index');

    // Tindakan Medis
    Route::get('/procedures', fn () => Inertia::render('Procedures/Index'))->name('procedures.index');


    // =========================
    // PENUNJANG MEDIS
    // =========================

    Route::get('/laboratory', fn () => Inertia::render('Laboratory/Index'))->name('laboratory.index');
    Route::get('/radiology', fn () => Inertia::render('Radiology/Index'))->name('radiology.index');
    Route::get('/pharmacy', fn () => Inertia::render('Pharmacy/Index'))->name('pharmacy.index');


    // =========================
    // KEUANGAN
    // =========================

    Route::get('/finance/billing', fn () => Inertia::render('Finance/Billing'))->name('finance.billing');
    Route::get('/finance/cashier', fn () => Inertia::render('Finance/Cashier'))->name('finance.cashier');
    Route::get('/finance/bpjs', fn () => Inertia::render('Finance/BPJSClaims'))->name('finance.bpjs');
    Route::get('/finance/accounting', fn () => Inertia::render('Finance/Accounting'))->name('finance.accounting');


    // =========================
    // HR / SDM (HRIS)
    // =========================

    Route::get('/hr/employees', fn () => Inertia::render('HR/Employees'))->name('hr.employees');
    Route::get('/hr/schedules', fn () => Inertia::render('HR/Schedules'))->name('hr.schedules');
    Route::get('/hr/payroll', fn () => Inertia::render('HR/Payroll'))->name('hr.payroll');


    // =========================
    // LOGISTIK & INVENTORY
    // =========================

    Route::get('/inventory', fn () => Inertia::render('Inventory/Index'))->name('inventory.index');
    Route::get('/assets', fn () => Inertia::render('Assets/Index'))->name('assets.index');
    Route::get('/suppliers', fn () => Inertia::render('Suppliers/Index'))->name('suppliers.index');


    // =========================
    // MANAJEMEN & ANALYTICS
    // =========================

    Route::get('/management/dashboard', fn () => Inertia::render('Management/Dashboard'))->name('management.dashboard');
    Route::get('/management/reports', fn () => Inertia::render('Management/Reports'))->name('management.reports');
    Route::get('/management/statistics', fn () => Inertia::render('Management/Statistics'))->name('management.statistics');


    // =========================
    // INTEGRASI EKSTERNAL
    // =========================

    Route::get('/integration/bpjs', fn () => Inertia::render('Integration/BPJS'))->name('integration.bpjs');
    Route::get('/integration/satusehat', fn () => Inertia::render('Integration/Satusehat'))->name('integration.satusehat');
    Route::get('/integration/antrian', fn () => Inertia::render('Integration/Antrian'))->name('integration.antrian');
    Route::get('/integration/api', fn () => Inertia::render('Integration/Api'))->name('integration.api');


    // =========================
    // SYSTEM ADMIN
    // =========================

    Route::get('/system/users', fn () => Inertia::render('System/Users'))->name('system.users');
    Route::get('/system/roles', fn () => Inertia::render('System/Roles'))->name('system.roles');
    Route::get('/system/audit-log', fn () => Inertia::render('System/AuditLog'))->name('system.audit');
    Route::get('/system/master-data', fn () => Inertia::render('System/MasterData'))->name('system.master');
    Route::get('/system/settings', fn () => Inertia::render('System/Settings'))->name('system.settings');

});

require __DIR__.'/auth.php';
