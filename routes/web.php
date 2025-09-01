
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


Route::middleware('auth')->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\HomeController::class,'index']);
    Route::post('logout', [\App\Http\Controllers\LoginController::class, 'logout']);
    //Anggota
    Route::get('anggota/index', [\App\Http\Controllers\AnggotaController::class,'index'])->name('anggota.index');
    Route::get('anggota/create', [\App\Http\Controllers\AnggotaController::class,'create'])->name('anggota.create');
    Route::post('anggota/store', [\App\Http\Controllers\AnggotaController::class,'store'])->name('anggota.store');
    Route::get('anggota/edit/{id}', [\App\Http\Controllers\AnggotaController::class,'edit'])->name('anggota.edit');
    Route::put('anggota/update/{id}', [\App\Http\Controllers\AnggotaController::class,'update'])->name('anggota.update');
    Route::delete('anggota/destroy/{id}', [\App\Http\Controllers\AnggotaController::class,'softDelete'])->name('anggota.softdelete');
    Route::get('anggota/restore', [\App\Http\Controllers\AnggotaController::class, 'indexRestore'])->name('anggota.index-restore');
    Route::get('anggota/restore/{id}', [\App\Http\Controllers\AnggotaController::class, 'restore'])->name('anggota.restore');
    Route::delete('anggota/destroy/destroy/{id}', [\App\Http\Controllers\AnggotaController::class,'destroy'])->name('anggota.destroy');

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
