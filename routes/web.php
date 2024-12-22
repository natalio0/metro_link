<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AjukanKendalaController;
use App\Http\Controllers\agendakotaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SesiController;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\AmqpCaster;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    // Login Register
    Route::post('/login', [SesiController::class, 'login'])->name('login.post');
    Route::post('/register', [SesiController::class, 'register'])->name('register.post');
});

Route::get('/home', function () {
    return redirect('/metrolink');
});

Route::middleware(['auth'])->group(function () {
    // tampilan admin
    Route::get('/admin', [AdminController::class, 'admin'])->middleware('UserAkses:admin');
    Route::get('/admin', [AdminController::class, 'count'])->middleware('UserAkses:admin');

    //  Admin Agenda Kota
    Route::get('/admin/agenda_kota', [AdminController::class, 'AdminAgendakota']);
    Route::put('/admin/agenda_kota/{id}', [AdminController::class, 'updateStatus'])->name('admin.agenda_kota.update');

    // Admin Akun admin CRUD
    Route::get('/admin/akun_admin', [AdminController::class, 'akun_admin']);
    Route::get('/admin/akun_admin/create', [AdminController::class, 'Admin_createAkun']);
    Route::post('/admin/akun_admin/store', [AdminController::class, 'Admin_storeAkun']);
    Route::get('/admin/akun_admin/edit/{id}', [AdminController::class, 'admin_editAkun']);
    Route::post('/admin/akun_admin/update/{id}', [AdminController::class, 'admin_updateAkun']);
    Route::delete('/admin/akun_admin/delete/{id}', [AdminController::class, 'akun_destroy']);

    // Admin Pengaduan
    Route::get('/admin/pengaduan', [PengaduanController::class, 'create']);
    Route::post('/admin/pengaduan', [PengaduanController::class, 'store']);

    // Admin Komentar
    Route::get('/admin/komentar', [AdminController::class, 'AdminKomentar']);
    Route::delete('admin/komentar/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
    // Route::get('/admin/komentar', [PenilaianController::class, 'komenAdmin'])->name('penilaian.index');

    // Tampilan user
    Route::get('/metrolink', [AdminController::class, 'user'])->middleware('UserAkses:user');
    Route::get('/metrolink/about_us', [AdminController::class, 'about_us']);
    Route::get('/metrolink', [PenilaianController::class, 'komenAdmin'])->name('penilaian.index');

    // Service user
    Route::get('/metrolink/service', [AdminController::class, 'service']);

    // Ajukan Kendala
    Route::get('/metrolink/service/ajukan_kendala', [AdminController::class, 'formPengaduan']);
    Route::post('/metrolink/service/store', [AjukanKendalaController::class, 'store'])->name('pengaduan.store');
    Route::get('/admin/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');

    // Peta Bencana
    Route::get('/metrolink/peta_bencana', [AdminController::class, 'peta_bencana']);

    // Penilaian
    Route::get('/metrolink/service/berikan_penilaian', [AdminController::class,'formPenilaian']);
    Route::post('/metrolink/service/berikan_penilaian/store', [PenilaianController::class, 'store'])->name('penilaian.store');


    // Route::post('/metrolink/service/berikan_penilaian', [PenilaianController::class, 'PenilaianStore'])->name('penilaian.store');

    Route::get('/metrolink/galery', [AdminController::class, 'galery']);
    Route::get('/metrolink/agenda_kota', [AdminController::class, 'tampilkanAgenda']);
    Route::get('/metrolink/agenda_kota/create', [AdminController::class, 'createAgenda']);
    Route::post('/metrolink/agenda_kota/store', [AdminController::class, 'storeAgenda'])->name('agenda_kota.storeAgenda');
    Route::get('/logout', [SesiController::class, 'logout']);
});

