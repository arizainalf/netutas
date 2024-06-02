<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffGuruController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\ProfilSekolahController;
use App\Http\Controllers\Admin\EkstrakurikulerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('berita',[HomeController::class, 'berita'])->name('berita');
Route::get('prestasi',[HomeController::class, 'prestasi'])->name('prestasi');
Route::get('staff',[HomeController::class, 'staff'])->name('staff');
Route::get('berita/{slug}', [App\Http\Controllers\HomeController::class, 'getBerita'])->name('berita.single');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::get('/forgot-password', [App\Http\Controllers\AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
  Route::resource('berita', BeritaController::class)->names('admin.berita');
  Route::resource('jabatan', JabatanController::class)->names('admin.jabatan');
  Route::resource('user', UserController::class)->names('admin.user');
  Route::resource('mapel', MapelController::class)->names('admin.mapel');
  Route::resource('staff', StaffGuruController::class)->names('admin.staff');
  Route::resource('prestasi', PrestasiController::class)->names('admin.prestasi');
  Route::resource('ekstrakurikuler', EkstrakurikulerController::class)->names('admin.ekstrakurikuler');
  Route::match(['get', 'put'], 'profil', [ProfilController::class, 'index'])->name('admin.profil');
  Route::match(['get', 'put'], 'profil-sekolah', [ProfilSekolahController::class, 'index'])->name('admin.profil.sekolah');
  Route::put('profil/password', [ProfilController::class, 'updatePassword'])->name('admin.profil.password');
});