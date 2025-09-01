
<?php

use App\Http\Controllers\BangunRuangController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// tampilkan
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('login');

Route::get('/bangunruang', [BangunRuangController::class, 'BangunRuang'])->name('bangunruang');
Route::post('/bangunruang', [BangunRuangController::class, 'BangunRuang'])->name('bangunruang.hitung');
