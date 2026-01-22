<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {

    // =========================
    // PROFILE
    // =========================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =========================
    // PELAYANAN MEDIS (SIMRS CORE)
    // =========================

    // Master Pasien
    Route::get('/patients', function () {
        return Inertia::render('Patients/Index');
    })->name('patients.index');

    // Registrasi / Kunjungan
    Route::get('/visits/create', function () {
        return Inertia::render('Visits/Create');
    })->name('visits.create');

    // Rekam Medis (SOAP)
    Route::get('/medical-records/soap', function () {
        return Inertia::render('MedicalRecords/Soap');
    })->name('medical-records.soap');

    // IGD / Triage
    Route::get('/igd', function () {
        return Inertia::render('IGD/Index');
    })->name('igd.index');

    // Rawat Jalan
    Route::get('/outpatient', function () {
        return Inertia::render('Outpatient/Index');
    })->name('outpatient.index');

    // Rawat Inap
    Route::get('/inpatient', function () {
        return Inertia::render('Inpatient/Index');
    })->name('inpatient.index');

    // Tindakan Medis
    Route::get('/procedures', function () {
        return Inertia::render('Procedures/Index');
    })->name('procedures.index');

    //Penunjang//
    Route::get('/laboratory', fn () => Inertia::render('Laboratory/Index'))->name('laboratory.index');
    Route::get('/radiology', fn () => Inertia::render('Radiology/Index'))->name('radiology.index');
    Route::get('/pharmacy', fn () => Inertia::render('Pharmacy/Index'))->name('pharmacy.index');

    //Keuangan//
    Route::get('/finance/billing', fn () => Inertia::render('Finance/Billing'))->name('finance.billing');
    Route::get('/finance/cashier', fn () => Inertia::render('Finance/Cashier'))->name('finance.cashier');
    Route::get('/finance/bpjs', fn () => Inertia::render('Finance/BPJSClaims'))->name('finance.bpjs');

    //Manajemen RS//
    Route::get('/management/dashboard', fn () => Inertia::render('Management/Dashboard'))->name('management.dashboard');
    Route::get('/management/reports', fn () => Inertia::render('Management/Reports'))->name('management.reports');
    Route::get('/management/statistics', fn () => Inertia::render('Management/Statistics'))->name('management.statistics');

    //System//
    Route::get('/system/users', fn () => Inertia::render('System/Users'))->name('system.users');
    Route::get('/system/roles', fn () => Inertia::render('System/Roles'))->name('system.roles');
    Route::get('/system/audit-log', fn () => Inertia::render('System/AuditLog'))->name('system.audit');
    Route::get('/system/master-data', fn () => Inertia::render('System/MasterData'))->name('system.master');


});

require __DIR__.'/auth.php';
