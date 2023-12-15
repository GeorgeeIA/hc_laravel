<?php

use App\Models\Pasien;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pasien/create', [App\Http\Controllers\PasienController::class,'create'])->name('pasien.create')->middleware('login_auth');
Route::post('/pasien', [App\Http\Controllers\PasienController::class,'store'])->name('pasien.store')->middleware('login_auth');
Route::get('/pasien', [App\Http\Controllers\PasienController::class,'index'])->name('pasien.index')->middleware('login_auth');
Route::get('/pasien/{pasien}', [App\Http\Controllers\PasienController::class,'show'])->name('pasien.show')->middleware('login_auth');
Route::get('/pasien/{pasien}/edit', [App\Http\Controllers\PasienController::class,'edit'])->name('pasien.edit')->middleware('login_auth');
Route::patch('/pasien/{pasien}', [App\Http\Controllers\PasienController::class,'update'])->name('pasien.update')->middleware('login_auth');
Route::delete('/pasien/{pasien}', [App\Http\Controllers\PasienController::class,'destroy'])->name('pasien.destroy')->middleware('login_auth');

Route::get('/dokter/create', [App\Http\Controllers\DokterController::class,'create'])->name('dokter.create')->middleware('login_auth');
Route::post('/dokter', [App\Http\Controllers\DokterController::class,'store'])->name('dokter.store')->middleware('login_auth');
Route::get('/dokter', [App\Http\Controllers\DokterController::class,'index'])->name('dokter.index')->middleware('login_auth');
Route::get('/dokter/{dokter}', [App\Http\Controllers\DokterController::class,'show'])->name('dokter.show')->middleware('login_auth');
Route::get('/dokter/{dokter}/edit', [App\Http\Controllers\DokterController::class,'edit'])->name('dokter.edit')->middleware('login_auth');
Route::patch('/dokter/{dokter}', [App\Http\Controllers\DokterController::class,'update'])->name('dokter.update')->middleware('login_auth');
Route::delete('/dokter/{dokter}', [App\Http\Controllers\DokterController::class,'destroy'])->name('dokter.destroy')->middleware('login_auth');

Route::get('/pegawai/create', [App\Http\Controllers\PegawaiController::class,'create'])->name('pegawai.create')->middleware('login_auth');
Route::post('/pegawai', [App\Http\Controllers\PegawaiController::class,'store'])->name('pegawai.store')->middleware('login_auth');
Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class,'index'])->name('pegawai.index')->middleware('login_auth');
Route::get('/pegawai/{pegawai}', [App\Http\Controllers\PegawaiController::class,'show'])->name('pegawai.show')->middleware('login_auth');
Route::get('/pegawai/{pegawai}/edit', [App\Http\Controllers\PegawaiController::class,'edit'])->name('pegawai.edit')->middleware('login_auth');
Route::patch('/pegawai/{pegawai}', [App\Http\Controllers\PegawaiController::class,'update'])->name('pegawai.update')->middleware('login_auth');
Route::delete('/pegawai/{pegawai}', [App\Http\Controllers\PegawaiController::class,'destroy'])->name('pegawai.destroy')->middleware('login_auth');

Route::get('/obat/create', [App\Http\Controllers\ObatController::class,'create'])->name('obat.create')->middleware('login_auth');
Route::post('/obat', [App\Http\Controllers\ObatController::class,'store'])->name('obat.store')->middleware('login_auth');
Route::get('/obat', [App\Http\Controllers\ObatController::class,'index'])->name('obat.index')->middleware('login_auth');
Route::get('/obat/{obat}', [App\Http\Controllers\ObatController::class,'show'])->name('obat.show')->middleware('login_auth');
Route::get('/obat/{obat}/edit', [App\Http\Controllers\ObatController::class,'edit'])->name('obat.edit')->middleware('login_auth');
Route::patch('/obat/{obat}', [App\Http\Controllers\ObatController::class,'update'])->name('obat.update')->middleware('login_auth');
Route::delete('/obat/{obat}', [App\Http\Controllers\ObatController::class,'destroy'])->name('obat.destroy')->middleware('login_auth');

Route::get('/login', [App\Http\Controllers\AdminController::class,'index'])->name('login.index');
Route::get('/logout', [App\Http\Controllers\AdminController::class,'logout'])->name('login.logout');
Route::post('/login', [App\Http\Controllers\AdminController::class,'process'])->name('login.process');
Route::get('/login/register', [App\Http\Controllers\AdminController::class,'register'])->name('login.register');
Route::post('/login/register', [App\Http\Controllers\AdminController::class,'store'])->name('login.store');

Route::get('/dasboard', [App\Http\Controllers\DasboardController::class,'index'])->name('dasboard.index');

Route::get('/landing', [App\Http\Controllers\LandingController::class,'index'])->name('landing.index');