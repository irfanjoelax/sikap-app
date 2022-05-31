<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/tugas', function () {
        return view('admin.tugas');
    });
    Route::get('/admin/indikator', function () {
        return view('admin.indikator');
    });
    Route::get('/admin/kegiatan', function () {
        return view('admin.kegiatan');
    });
    Route::get('/admin/user', function () {
        return view('admin.user');
    });
    Route::get('/admin/rencana/dosen', function () {
        return view('admin.rencana.dosen');
    });
    Route::get('/admin/rencana/tendik', function () {
        return view('admin.rencana.tendik');
    });
});

Route::group(['middleware' => ['role:dosen']], function () {
    Route::get('/dosen/home', [App\Http\Controllers\DosenController::class, 'index'])->name('dosen.home');
    Route::get('/dosen/rencana', function () {
        return view('dosen.rencana');
    });
    Route::get('/dosen/laporan', function () {
        return view('dosen.laporan');
    });
});

Route::group(['middleware' => ['role:tendik']], function () {
    Route::get('/tendik/home', [App\Http\Controllers\TendikController::class, 'index'])->name('tendik.home');
    Route::get('/tendik/rencana', function () {
        return view('tendik.rencana');
    });
    Route::get('/tendik/laporan', function () {
        return view('tendik.laporan');
    });
});
