<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\SiswaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//route landing
//Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');

//route daftar
Route::resource('daftar', DaftarController::class);

//route siswa
Route::resource('siswa', SiswaController::class)->except(['destroy']);
Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
// Route::get('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
