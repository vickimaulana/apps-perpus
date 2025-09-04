<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BangunRuangController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// tampilkan
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::post('logout', [\App\Http\Controllers\LoginController::class, 'logout']);
    //Anggota
    Route::get('anggota/index', [\App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('anggota/create', [\App\Http\Controllers\AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('anggota/store', [\App\Http\Controllers\AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('anggota/edit/{id}', [\App\Http\Controllers\AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('anggota/update/{id}', [\App\Http\Controllers\AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('anggota/destroy/{id}', [\App\Http\Controllers\AnggotaController::class, 'softDelete'])->name('anggota.softdelete');
    Route::get('anggota/restore', [\App\Http\Controllers\AnggotaController::class, 'indexRestore'])->name('anggota.index-restore');
    Route::get('anggota/restore/{id}', [\App\Http\Controllers\AnggotaController::class, 'restore'])->name('anggota.restore');
    Route::delete('anggota/destroy/destroy/{id}', [\App\Http\Controllers\AnggotaController::class,'destroy'])->name('anggota.destroy');

    //Lokasi
    Route::get('lokasi/index', [\App\Http\Controllers\locationController::class, 'index'])->name('lokasi.index');
    Route::get('lokasi/create', [\App\Http\Controllers\locationController::class, 'create'])->name('lokasi.create');
    Route::post('lokasi/store', [\App\Http\Controllers\locationController::class, 'store'])->name('lokasi.store');
    Route::get('lokasi/edit/{id}', [\App\Http\Controllers\locationController::class, 'edit'])->name('lokasi.edit');
    Route::put('lokasi/update/{id}', [\App\Http\Controllers\locationController::class, 'update'])->name('lokasi.update');
    Route::delete('lokasi/destroy/{id}', [\App\Http\Controllers\locationController::class, 'destroy'])->name('lokasi.destroy');

    //kategori
    Route::get('kategori/index', [\App\Http\Controllers\CategoryController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('kategori.create');
    Route::post('kategori/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('kategori.store');
    Route::get('kategori/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('kategori.destroy');

    //Buku
    Route::get('buku/index', [\App\Http\Controllers\BookController::class, 'index'])->name('buku.index');
    Route::get('buku/create', [\App\Http\Controllers\BookController::class, 'create'])->name('buku.create');
    Route::post('buku/store', [\App\Http\Controllers\BookController::class, 'store'])->name('buku.store');
    Route::get('buku/edit/{id}', [\App\Http\Controllers\BookController::class, 'edit'])->name('buku.edit');
    Route::put('buku/update/{id}', [\App\Http\Controllers\BookController::class, 'update'])->name('buku.update');
    Route::delete('buku/destroy/{id}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('buku.destroy');

    //Pinjam Buku
    Route::resource('transaction', \App\Http\Controllers\TransactionController::class);
    Route::get('get-buku/{id}', [\App\Http\Controllers\TransactionController::class, 'getBukuByIdCategory']);
    //print
    Route::get('print-peminjam/{id}', [\App\Http\Controllers\TransactionController::class, 'print']);
});

// // Halaman utama daftar bangun ruang
// Route::get('/bangunruang', [BangunRuangController::class, 'index'])->name('bangunruang.index');

// // Kubus
// Route::get('/bangunruang/kubus', [BangunRuangController::class, 'kubus'])->name('bangunruang.kubus');
// Route::post('/bangunruang/kubus', [BangunRuangController::class, 'kubus']);

// // Balok
// Route::get('/bangunruang/balok', [BangunRuangController::class, 'balok'])->name('bangunruang.balok');
// Route::post('/bangunruang/balok', [BangunRuangController::class, 'balok']);

// // Limas
// Route::get('/bangunruang/limas', [BangunRuangController::class, 'limas'])->name('bangunruang.limas');
// Route::post('/bangunruang/limas', [BangunRuangController::class, 'limas']);

// // Tabung
// Route::get('/bangunruang/tabung', [BangunRuangController::class, 'tabung'])->name('bangunruang.tabung');
// Route::post('/bangunruang/tabung', [BangunRuangController::class, 'tabung']);

// // Bola
// Route::get('/bangunruang/bola', [BangunRuangController::class, 'bola'])->name('bangunruang.bola');
// Route::post('/bangunruang/bola', [BangunRuangController::class, 'bola']);
