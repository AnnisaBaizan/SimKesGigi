<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\KartupasienController;
use App\Http\Controllers\AnamripasienController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

	Route::resource('/user', UserController::class)->middleware('admin');
	// Route::get('/user', [UserController::class, 'index'])->name('user.index');
	// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
	// Route::post('/user', [UserController::class, 'store'])->name('user.store');
	// Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
	// Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
	// Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
	// Route::Delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::post('importuser', [UserController::class, 'import'])->name('importuser')->middleware('pembimbing');
    Route::get('exportuser', [UserController::class, 'export'])->name('exportuser')->middleware('pembimbing');

	// Route::resource('/kartupasien', KartupasienController::class);
	Route::get('/kartupasien', [KartupasienController::class, 'index'])->name('kartupasien.index');
	Route::get('/kartupasien/create', [KartupasienController::class, 'create'])->name('kartupasien.create')->middleware('mahasiswa');
	Route::post('/kartupasien', [KartupasienController::class, 'store'])->name('kartupasien.store')->middleware('mahasiswa');
	Route::get('/kartupasien/{kartupasien}', [KartupasienController::class, 'show'])->name('kartupasien.show');
	Route::get('/kartupasien/{kartupasien}/edit', [KartupasienController::class, 'edit'])->name('kartupasien.edit')->middleware('mahasiswa');
	Route::put('/kartupasien/{kartupasien}', [KartupasienController::class, 'update'])->name('kartupasien.update')->middleware('mahasiswa');
	Route::Delete('/kartupasien/{kartupasien}', [KartupasienController::class, 'destroy'])->name('kartupasien.destroy')->middleware('mahasiswa');
	
    Route::post('importpasien', [KartupasienController::class, 'import'])->name('importpasien')->middleware('pembimbing');
    Route::get('exportpasien', [KartupasienController::class, 'export'])->name('exportpasien')->middleware('pembimbing');

	// Route::resource('/anamripasien', anamripasienController::class);
	Route::get('/anamripasien', [AnamripasienController::class, 'index'])->name('anamripasien.index');
	Route::get('/anamripasien/create', [AnamripasienController::class, 'create'])->name('anamripasien.create')->middleware('mahasiswa');
	Route::post('/anamripasien', [AnamripasienController::class, 'store'])->name('anamripasien.store')->middleware('mahasiswa');
	Route::get('/anamripasien/{anamripasien}', [AnamripasienController::class, 'show'])->name('anamripasien.show');
	Route::get('/anamripasien/{anamripasien}/edit', [AnamripasienController::class, 'edit'])->name('anamripasien.edit')->middleware('mahasiswa');
	Route::put('/anamripasien/{anamripasien}', [AnamripasienController::class, 'update'])->name('anamripasien.update')->middleware('mahasiswa');
	Route::Delete('/anamripasien/{anamripasien}', [AnamripasienController::class, 'destroy'])->name('anamripasien.destroy')->middleware('mahasiswa');

	Route::post('importanamripasien', [AnamripasienController::class, 'import'])->name('importanamripasien')->middleware('pembimbing');
    Route::get('exportanamripasien', [AnamripasienController::class, 'export'])->name('exportanamripasien')->middleware('pembimbing');

	// Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');

	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
