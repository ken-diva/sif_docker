<?php

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Sdm;
use App\Http\Controllers\Sekre\SekreBA;
use App\Http\Controllers\Sekre\SekreCariSTSKDosen;
// use App\Http\Controllers\C_Sekre;
use App\Http\Controllers\Sekre\SekreDashboard;
use App\Http\Controllers\Sekre\SekreNotula;
use App\Http\Controllers\Sekre\SekreRuangRapat;
use App\Http\Controllers\Sekre\SekreSK;
use App\Http\Controllers\Sekre\SekreSuratTugas;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::controller(C_Auth::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});

Route::controller(C_Sdm::class)->group(function () {
    Route::get('/sdm/dashboard', 'index');
    Route::get('/sdm/data-dosen', 'table_dosen');
    Route::post('/sdm/data-dosen-filtered', 'table_dosen_filtered');
    Route::get('/sdm/profile-dosen/{name}', 'profile_dosen');
    Route::get('/sdm/data-tpa', 'table_tpa');
    Route::get('/sdm/profile-tpa/{name}/{unitname}/{employmentstatus}', 'profile_tpa');
});

// Route::controller(C_Sekre::class)->group(function () {
//     Route::get('/sekre/dashboard', 'index');
//     Route::get('/sekre/ruang_rapat', 'ruang_rapat');
// });

Route::get('/sekre/dashboard', [SekreDashboard::class, 'index']);
Route::post('/sekre/dashboard/filtered', [SekreDashboard::class, 'filtered']);

Route::get('/sekre/st', [SekreSuratTugas::class, 'index']);
Route::post('/sekre/st/filtered', [SekreSuratTugas::class, 'filtered']);
Route::get('/sekre/st/detail/{deskripsi}', [SekreSuratTugas::class, 'detail']);

Route::get('/sekre/sk', [SekreSK::class, 'index']);
Route::post('/sekre/sk/filtered', [SekreSK::class, 'filtered']);
Route::get('/sekre/sk/detail/{judul_sk}', [SekreSK::class, 'detail']);

Route::get('/sekre/cari_stsk', [SekreCariSTSKDosen::class, 'index']);

Route::get('/sekre/notula', [SekreNotula::class, 'index']);
Route::post('/sekre/notula/filtered', [SekreNotula::class, 'filtered']);
Route::get('/sekre/notula/detail/{agenda}', [SekreNotula::class, 'detail']);

Route::get('/sekre/ba', [SekreBA::class, 'index']);
Route::get('/sekre/ba/detail/{judul}', [SekreBA::class, 'detail']);

Route::get('/sekre/prr', [SekreRuangRapat::class, 'index']);
Route::get('/sekre/prr/calendar', [SekreRuangRapat::class, 'calendar']);
Route::get('/sekre/prr/detail/{tanggal}', [SekreRuangRapat::class, 'detail']);
