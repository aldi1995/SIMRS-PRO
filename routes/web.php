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
    Route::get('/patients', fn () => Inertia::render('Patients/Index'))->name('patients.index');
    Route::get('/patients/create', fn () => Inertia::render('Patients/Create'))->name('patients.create');

    // Kunjungan / Registrasi
    Route::get('/visits', fn () => Inertia::render('Visits/Index'))->name('visits.index');
    Route::get('/visits/create', fn () => Inertia::render('Visits/Create'))->name('visits.create');

    // Rekam Medis
    Route::get('/medical-records', fn () => Inertia::render('MedicalRecords/Index'))->name('medical-records.index');
    Route::get('/medical-records/create', fn () => Inertia::render('MedicalRecords/Create'))->name('medical-records.create');
    Route::get('/medical-records/soap', fn () => Inertia::render('MedicalRecords/Soap'))->name('medical-records.soap');

    // IGD
    Route::get('/igd', fn () => Inertia::render('IGD/Index'))->name('igd.index');
    Route::get('/igd/create', fn () => Inertia::render('IGD/Create'))->name('igd.create');

    // Rawat Jalan
    Route::get('/outpatient', fn () => Inertia::render('Outpatient/Index'))->name('outpatient.index');
    Route::get('/outpatient/create', fn () => Inertia::render('Outpatient/Create'))->name('outpatient.create');

    // Rawat Inap
    Route::get('/inpatient', fn () => Inertia::render('Inpatient/Index'))->name('inpatient.index');
    Route::get('/inpatient/create', fn () => Inertia::render('Inpatient/Create'))->name('inpatient.create');

    // Tindakan Medis
    Route::get('/procedures', fn () => Inertia::render('Procedures/Index'))->name('procedures.index');
    Route::get('/procedures/create', fn () => Inertia::render('Procedures/Create'))->name('procedures.create');

    // =========================
    // PENUNJANG
    // =========================
    Route::get('/laboratory', fn () => Inertia::render('Laboratory/Index'))->name('laboratory.index');
    Route::get('/laboratory/create', fn () => Inertia::render('Laboratory/Create'))->name('laboratory.create');

    Route::get('/radiology', fn () => Inertia::render('Radiology/Index'))->name('radiology.index');
    Route::get('/radiology/create', fn () => Inertia::render('Radiology/Create'))->name('radiology.create');

    Route::get('/pharmacy', fn () => Inertia::render('Pharmacy/Index'))->name('pharmacy.index');
    Route::get('/pharmacy/create', fn () => Inertia::render('Pharmacy/Create'))->name('pharmacy.create');

    // =========================
    // KEUANGAN
    // =========================
    Route::get('/finance/billing', fn () => Inertia::render('Finance/Billing'))->name('finance.billing');
    Route::get('/finance/billing/create', fn () => Inertia::render('Finance/BillingCreate'))->name('finance.billing.create');

    Route::get('/finance/cashier', fn () => Inertia::render('Finance/Cashier'))->name('finance.cashier');
    Route::get('/finance/cashier/create', fn () => Inertia::render('Finance/CashierCreate'))->name('finance.cashier.create');

    Route::get('/finance/bpjs', fn () => Inertia::render('Finance/BPJSClaims'))->name('finance.bpjs');

    // =========================
    // MANAJEMEN
    // =========================
    Route::get('/management/dashboard', fn () => Inertia::render('Management/Dashboard'))->name('management.dashboard');
    Route::get('/management/reports', fn () => Inertia::render('Management/Reports'))->name('management.reports');
    Route::get('/management/statistics', fn () => Inertia::render('Management/Statistics'))->name('management.statistics');

    // =========================
    // SISTEM
    // =========================
    Route::get('/system/users', fn () => Inertia::render('System/Users'))->name('system.users');
    Route::get('/system/roles', fn () => Inertia::render('System/Roles'))->name('system.roles');
    Route::get('/system/audit-log', fn () => Inertia::render('System/AuditLog'))->name('system.audit');
    Route::get('/system/master-data', fn () => Inertia::render('System/MasterData'))->name('system.master');

});

require __DIR__.'/auth.php';
