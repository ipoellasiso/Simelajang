<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
Use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\AkunpajakController;
use App\Http\Controllers\JenispajakController;
use App\Http\Controllers\plsController;
use App\Http\Controllers\PajaklsController;
use App\Http\Controllers\PajakkppController;
use App\Http\Controllers\PotonganbpjsController;
use App\Http\Controllers\Simpansp2dsipdriController;
use App\Http\Controllers\TokensipdsController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::post('/postlogin', [logincontroller::class,'postlogin'])->name('postlogin');
Route::get('/logout', [logincontroller::class,'logout'])->name('logout');
route::get('/verify/{verify_key}',[logincontroller::class,'verify']);

Route::group(['middleware' => ['auth','CekLevel:admin']], function(){
    Route::get('/beranda', [BerandaController::class,'index'])->name('beranda');
    Route::get('/ls', [BerandaController::class,'menuLS'])->name('ls');
    Route::get('/gu', [BerandaController::class,'menuGU'])->name('gu');
    Route::get('/controlpengguna', [PenggunaController::class,'index'])->name('controlpengguna');
    route::get('/hapus-user/{id}',[logincontroller::class,'destroy'])->name('hapus-user');

    Route::get('/reg',[logincontroller::class,'create'])->name('registrasi');
    Route::post('/reg',[logincontroller::class,'register']);

    Route::get('/tampildatapengguna/{id}',[logincontroller::class,'tampildatapengguna'])->name('tampildatapengguna');

    // opd
    Route::get('/tampilopd',[OpdController::class,'index'])->name('tampilopd');
    route::get('/hapus-opd/{id}',[OpdController::class,'destroy'])->name('hapus-opd');
    route::post('/simpanopd',[OpdController::class,'store'])->name('simpanopd');
    route::post('/editopd/{id}',[OpdController::class,'update'])->name('editopd');
    // end opd

    // akunpajak
    Route::get('/tampilakunpajak',[AkunpajakController::class,'index'])->name('tampilakunpajak');
    route::get('/hapus-akunpajak/{id}',[AkunpajakController::class,'destroy'])->name('hapus-akunpajak');
    route::post('/simpanakunpajak',[AkunpajakController::class,'store'])->name('simpanakunpajak');
    route::post('/editakunpajak/{id}',[AkunpajakController::class,'update'])->name('editakunpajak');
    route::get('/createakunpajak',[AkunpajakController::class,'create'])->name('createakunpajak');

    // end akunpajak

    // jenispajak
    Route::get('/tampiljenispajak',[JenispajakController::class,'index'])->name('tampiljenispajak');
    route::get('/hapus-jenispajak/{id}',[JenispajakController::class,'destroy'])->name('hapus-jenispajak');
    route::post('/simpanjenispajak',[JenispajakController::class,'store'])->name('simpanjenispajak');
    route::get('/editjenispajak/{id}',[JenispajakController::class,'update'])->name('editjenispajak');
    // end jenispajak

    // // Route::get('/tampilpls',[plsController::class,'index'])->name('tampilpls');
    Route::get('/tampilpajakls',[PajakkppController::class,'index'])->name('tampilpajakls');
    route::get('/hapus-pajakls/{id}',[PajakkppController::class,'destroy'])->name('hapus-pajakls');
    route::get('/update-pajakls/{id}',[PajakkppController::class,'update'])->name('update-pajakls');
    route::get('/updateterima-pajakls/{id}',[PajakkppController::class,'updateterima'])->name('updateterima-pajakls');
    route::get('/editpajakkpp3/{id}',[PajakkppController::class,'updatepajakkpp3'])->name('editpajakkpp3');
    route::get('/update-pajaklstolak/{id}',[PajaklsController::class,'update'])->name('update-pajaklstolak');
    Route::get('/tampilpajaksipdri',[PajaklsController::class,'index'])->name('tampilpajaksipdri');
    route::get('/editpajakls/{id}',[PajaklsController::class,'update'])->name('editpajakls');

    route::get('/simpansp2dsipdri',[Simpansp2dsipdriController::class,'store'])->name('simpansp2dsipdri');
    route::get('/tampilsp2dsipdri',[Simpansp2dsipdriController::class,'index'])->name('tampilsp2dsipdri');
    route::get('/tampilsp2dsipdrigu',[Simpansp2dsipdriController::class,'indexgu'])->name('tampilsp2dsipdrigu');

    Route::get('/tampilpotonganbpjs',[PotonganbpjsController::class,'index'])->name('tampilpotonganbpjs');

    Route::get('/tampiltoken',[TokensipdsController::class,'index'])->name('tampiltoken');
    Route::get('/simpantoken/{id}',[TokensipdsController::class,'store'])->name('simpantoken');
});

Route::group(['middleware' => ['auth','CekLevel:admin,user,verifikasi']], function(){
    Route::get('/beranda', [BerandaController::class,'index'])->name('beranda');
    Route::get('/gu', [BerandaController::class,'menuGU'])->name('gu');
    Route::get('/tampilpls',[plsController::class,'index'])->name('tampilpls');
    Route::get('/controlpenggunauser', [PenggunaController::class,'indexuser'])->name('controlpenggunauser');
    Route::get('/controlpengguna', [PenggunaController::class,'index'])->name('controlpengguna');
    route::get('/tampilsp2dsipdrigu',[Simpansp2dsipdriController::class,'indexgu'])->name('tampilsp2dsipdrigu');
});


