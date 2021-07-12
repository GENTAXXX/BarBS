<?php

use App\Http\Controllers\LowonganController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DospemController;
use App\Http\Controllers\SpvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\LogBookController;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LowonganController::class, 'AllLowongan']);

Route::get('detail/{id}', [ApplyController::class, 'detail'])->name('detail.show');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', ProfileController::class);
});

Route::group(['middleware' => 'is_depart'], function () {
    Route::get('depart/home', [DepartController::class, 'departHome'])->name('depart.home');
    //CRUD Users
    // Route::resource('users', UserController::class);
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    //List Mahasiswa
    Route::get('depart/mahasiswa', [DepartController::class, 'listMhs'])->name('depart.mhs');
    Route::get('depart/mahasiswa/{id}', [DepartController::class, 'detailMhs'])->name('depart.detailMhs');
    //List Lowongan
    Route::get('depart/lowongan', [LowonganController::class, 'index'])->name('depart.lowongan');
    //Pengajuan
    Route::get('depart/pengajuan', [ApplyController::class, 'listPengajuan'])->name('pengajuan.index');
    Route::get('depart/pengajuan/{id}', [ApplyController::class, 'pengajuan'])->name('pengajuan.edit');
    Route::post('depart/pengajuan/{id}', [ApplyController::class, 'updateDospem'])->name('pengajuan.dospem');
});

Route::group(['middleware' => 'is_mitra'], function () {
    Route::get('mitra/home', [MitraController::class, 'mitraHome'])->name('mitra.home');
    //CRUD Lowongan
    Route::resource('lowongan', LowonganController::class);
    //Pendaftar
    Route::get('mitra/pendaftar', [ApplyController::class, 'listPendaftar'])->name('pendaftar.index');
    Route::get('mitra/pendaftar/{id}', [ApplyController::class, 'pendaftar'])->name('pendaftar.edit');
    Route::get('mitra/approve/{id}', [ApplyController::class, 'approve'])->name('pendaftar.approve');
    Route::get('mitra/reject/{id}', [ApplyController::class, 'reject'])->name('pendaftar.reject');
    Route::post('mitra/pendaftar/{id}', [ApplyController::class, 'approval'])->name('pendaftar.approval');
    //Mhs Magang
    Route::get('mitra/magang', [ApplyController::class, 'listMagang'])->name('magang.index');
});

Route::group(['middleware' => 'is_dospem'], function () {
    Route::get('dosen/home', [DospemController::class, 'dospemHome'])->name('dospem.home');
    //Bimbingan
    Route::get('dosen/bimbingan', [BimbinganController::class, 'mhsBimbingan'])->name('dospem.index');
    Route::get('dosen/bimbingan/{id}', [BimbinganController::class, 'bimbinganDetail'])->name('dospem.bimbingan');
    Route::post('dosen/bimbingan/{id}', [BimbinganController::class, 'feedbackBimbingan'])->name('dospem.feedback');
});

Route::group(['middleware' => 'is_supervisor'], function () {
    Route::get('supervisor/home', [SpvController::class, 'supervisorHome'])->name('supervisor.home');
    //Logbook
    Route::get('supervisor/logbook', [LogBookController::class, 'mhsLogbook'])->name('spv.index');
    Route::get('supervisor/logbook/{id}', [LogBookController::class, 'logbookDetail'])->name('spv.logbook');
});

Route::group(['middleware' => 'is_mahasiswa'], function () {
    Route::get('mahasiswa/home', [MhsController::class, 'mahasiswaHome'])->name('mahasiswa.home');
    //Lowongan
    Route::get('mahasiswa/apply/{id}', [ApplyController::class, 'apply'])->name('lowongan.apply');
    Route::post('mahasiswa/apply', [ApplyController::class, 'store'])->name('apply.store');
    Route::group(['middleware' => 'is_approve'], function() {
        //Bimbingan
        Route::get('mahasiswa/bimbingan', [BimbinganController::class, 'index'])->name('bimbingan.index');
        Route::get('mahasiswa/bimbingan/{id}', [BimbinganController::class, 'show'])->name('bimbingan.show');
        Route::post('mahasiswa/bimbingan', [BimbinganController::class, 'store'])->name('bimbingan.store');
        Route::put('mahasiswa/bimbingan/{id}', [BimbinganController::class, 'update'])->name('bimbingan.update');
        Route::delete('mahasiswa/bimbingan/{id}', [BimbinganController::class, 'delete'])->name('bimbingan.delete');
        //Logbook
        Route::get('mahasiswa/logbook/cetak', [LogBookController::class, 'print'])->name('logbook.print');
        Route::get('mahasiswa/logbook', [LogBookController::class, 'index'])->name('logbook.index');
        Route::get('mahasiswa/logbook/{id}', [LogBookController::class, 'show'])->name('logbook.show');
        Route::post('mahasiswa/logbook', [LogBookController::class, 'store'])->name('logbook.store');
        Route::put('mahasiswa/logbook/{id}', [LogBookController::class, 'update'])->name('logbook.update');
        Route::delete('mahasiswa/logbook/{id}', [LogBookController::class, 'delete'])->name('logbook.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
