<?php
use App\Http\Controllers\CctvController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\QrCodeController;

// Redirect rute '/' ke '/login'
// Route::get('/generate-qr-code', [QrCodeController::class, 'generateQrCodeWithLogo']);
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes that do not require authentication
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Routes that require authentication
Route::middleware(['auth', 'verified', \App\Http\Middleware\SingleSession::class])->group(function () {
    Route::get('/dashboard', [CctvController::class, 'dashboard'])->name('dashboard');
    Route::get('/cctv', [CctvController::class, 'index'])->name('cctvs.index');

    Route::get('/cctv/create', [CctvController::class, 'create'])->name('cctvs.create');
    Route::post('/cctv', [CctvController::class, 'store'])->name('cctvs.store');
    Route::get('/cctv/{cctv}/edit', [CctvController::class, 'edit'])->name('cctvs.edit');
    Route::patch('/cctv/{cctv}', [CctvController::class, 'update'])->name('cctvs.update');
    Route::delete('/cctv/{cctv}', [CctvController::class, 'destroy'])->name('cctvs.destroy');
    Route::get('/cctv/export', [CctvController::class, 'exportPDF'])->name('cctvs.exportPDF');
    Route::get('/cctvs/exportExcel', [CctvController::class, 'exportExcel'])->name('cctvs.exportExcel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ping-test', [CctvController::class, 'pingTest']);

    // Logout Route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
