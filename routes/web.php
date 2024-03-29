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
use Illuminate\Support\Facades\DB;
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
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PengsiperiController;
use App\Http\Controllers\EksplakkalController;
use App\Http\Controllers\OdontogramController;
use App\Http\Controllers\OhisController;
use App\Http\Controllers\VitalitasController;
use App\Http\Controllers\AnomalimukosaController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PeriodontalController;
use Illuminate\Http\Request;

Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
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
	
	Route::put('/anamripasien/acc/{id}', [AnamripasienController::class, 'acc'])->name('anamripasien.acc')->middleware('pembimbing');

	Route::post('importanamripasien', [AnamripasienController::class, 'import'])->name('importanamripasien')->middleware('pembimbing');
    Route::get('exportanamripasien', [AnamripasienController::class, 'export'])->name('exportanamripasien')->middleware('pembimbing');

	// Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');

	// Route::resource('/pertanyaan', PertanyaanController::class);
	Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
	Route::get('/pertanyaan/create', [PertanyaanController::class, 'create'])->name('pertanyaan.create')->middleware('admin');
	Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store')->middleware('admin');
	Route::get('/pertanyaan/{pertanyaan}', [PertanyaanController::class, 'show'])->name('pertanyaan.show');
	Route::get('/pertanyaan/{pertanyaan}/edit', [PertanyaanController::class, 'edit'])->name('pertanyaan.edit')->middleware('admin');
	Route::put('/pertanyaan/{pertanyaan}', [PertanyaanController::class, 'update'])->name('pertanyaan.update')->middleware('admin');
	Route::Delete('/pertanyaan/{pertanyaan}', [PertanyaanController::class, 'destroy'])->name('pertanyaan.destroy')->middleware('admin');

	Route::post('importpertanyaan', [pertanyaanController::class, 'import'])->name('importpertanyaan')->middleware('admin');
    Route::get('exportpertanyaan', [pertanyaanController::class, 'export'])->name('exportpertanyaan')->middleware('admin');

	// Route::resource('/pengsiperi', PengsiperiController::class);
	Route::get('/pengsiperi', [PengsiperiController::class, 'index'])->name('pengsiperi.index');
	Route::get('/pengsiperi/create', [PengsiperiController::class, 'create'])->name('pengsiperi.create')->middleware('mahasiswa');
	Route::post('/pengsiperi', [PengsiperiController::class, 'store'])->name('pengsiperi.store')->middleware('mahasiswa');
	Route::get('/pengsiperi/{pengsiperi}', [PengsiperiController::class, 'show'])->name('pengsiperi.show');
	Route::get('/pengsiperi/{pengsiperi}/edit', [PengsiperiController::class, 'edit'])->name('pengsiperi.edit')->middleware('mahasiswa');
	Route::put('/pengsiperi/{pengsiperi}', [PengsiperiController::class, 'update'])->name('pengsiperi.update')->middleware('mahasiswa');
	Route::Delete('/pengsiperi/{pengsiperi}', [PengsiperiController::class, 'destroy'])->name('pengsiperi.destroy')->middleware('mahasiswa');

	Route::post('importpengsiperi', [PengsiperiController::class, 'import'])->name('importpengsiperi')->middleware('mahasiswa');
    Route::get('exportpengsiperi', [PengsiperiController::class, 'export'])->name('exportpengsiperi')->middleware('mahasiswa');

	// Route::resource('/eksplakkal', eksplakkalController::class);
	Route::get('/eksplakkal', [EksplakkalController::class, 'index'])->name('eksplakkal.index');
	Route::get('/eksplakkal/create', [EksplakkalController::class, 'create'])->name('eksplakkal.create')->middleware('mahasiswa');
	Route::post('/eksplakkal', [EksplakkalController::class, 'store'])->name('eksplakkal.store')->middleware('mahasiswa');
	Route::get('/eksplakkal/{eksplakkal}', [EksplakkalController::class, 'show'])->name('eksplakkal.show');
	Route::get('/eksplakkal/{eksplakkal}/edit', [EksplakkalController::class, 'edit'])->name('eksplakkal.edit')->middleware('mahasiswa');
	Route::put('/eksplakkal/{eksplakkal}', [EksplakkalController::class, 'update'])->name('eksplakkal.update')->middleware('mahasiswa');
	Route::Delete('/eksplakkal/{eksplakkal}', [EksplakkalController::class, 'destroy'])->name('eksplakkal.destroy')->middleware('mahasiswa');

	
	Route::put('/eksplakkal/acc/{id}', [EksplakkalController::class, 'acc'])->name('eksplakkal.acc')->middleware('pembimbing');

	Route::post('importeksplakkal', [EksplakkalController::class, 'import'])->name('importeksplakkal')->middleware('mahasiswa');
    Route::get('exporteksplakkal', [EksplakkalController::class, 'export'])->name('exporteksplakkal')->middleware('mahasiswa');

	// Route::resource('/odontogram', OdontogramController::class);
	Route::get('/odontogram', [OdontogramController::class, 'index'])->name('odontogram.index');
	Route::get('/odontogram/create', [OdontogramController::class, 'create'])->name('odontogram.create')->middleware('mahasiswa');
	Route::post('/odontogram', [OdontogramController::class, 'store'])->name('odontogram.store')->middleware('mahasiswa');
	Route::get('/odontogram/{odontogram}', [OdontogramController::class, 'show'])->name('odontogram.show');
	Route::get('/odontogram/{odontogram}/edit', [OdontogramController::class, 'edit'])->name('odontogram.edit')->middleware('mahasiswa');
	Route::put('/odontogram/{odontogram}', [OdontogramController::class, 'update'])->name('odontogram.update')->middleware('mahasiswa');
	Route::Delete('/odontogram/{odontogram}', [OdontogramController::class, 'destroy'])->name('odontogram.destroy')->middleware('mahasiswa');
	
	Route::put('/odontogram/acc/{id}', [OdontogramController::class, 'acc'])->name('odontogram.acc')->middleware('pembimbing');

	Route::post('importodontogram', [OdontogramController::class, 'import'])->name('importodontogram')->middleware('mahasiswa');
    Route::get('exportodontogram', [OdontogramController::class, 'export'])->name('exportodontogram')->middleware('mahasiswa');

	// Route::resource('/ohis', OhisController::class);
	Route::get('/ohis', [OhisController::class, 'index'])->name('ohis.index');
	Route::get('/ohis/create', [OhisController::class, 'create'])->name('ohis.create')->middleware('mahasiswa');
	Route::post('/ohis', [OhisController::class, 'store'])->name('ohis.store')->middleware('mahasiswa');
	Route::get('/ohis/{ohis}', [OhisController::class, 'show'])->name('ohis.show');
	Route::get('/ohis/{ohis}/edit', [OhisController::class, 'edit'])->name('ohis.edit')->middleware('mahasiswa');
	Route::put('/ohis/{ohis}', [OhisController::class, 'update'])->name('ohis.update')->middleware('mahasiswa');
	Route::Delete('/ohis/{ohis}', [OhisController::class, 'destroy'])->name('ohis.destroy')->middleware('mahasiswa');

	Route::put('/ohis/acc/{id}', [OhisController::class, 'acc'])->name('ohis.acc')->middleware('pembimbing');

	Route::post('importohis', [OhisController::class, 'import'])->name('importohis')->middleware('mahasiswa');
    Route::get('exportohis', [OhisController::class, 'export'])->name('exportohis')->middleware('mahasiswa');

	// Route::resource('/vitalitas', VitalitasController::class);
	Route::get('/vitalitas', [VitalitasController::class, 'index'])->name('vitalitas.index');
	Route::get('/vitalitas/create', [VitalitasController::class, 'create'])->name('vitalitas.create')->middleware('mahasiswa');
	Route::post('/vitalitas', [VitalitasController::class, 'store'])->name('vitalitas.store')->middleware('mahasiswa');
	Route::get('/vitalitas/{vitalitas}', [VitalitasController::class, 'show'])->name('vitalitas.show');
	Route::get('/vitalitas/{vitalitas}/edit', [VitalitasController::class, 'edit'])->name('vitalitas.edit')->middleware('mahasiswa');
	Route::put('/vitalitas/{vitalitas}', [VitalitasController::class, 'update'])->name('vitalitas.update')->middleware('mahasiswa');
	Route::Delete('/vitalitas/{vitalitas}', [VitalitasController::class, 'destroy'])->name('vitalitas.destroy')->middleware('mahasiswa');
	
	Route::put('/vitalitas/acc/{id}', [VitalitasController::class, 'acc'])->name('vitalitas.acc')->middleware('pembimbing');

	Route::post('importvitalitas', [VitalitasController::class, 'import'])->name('importvitalitas')->middleware('mahasiswa');
    Route::get('exportvitalitas', [VitalitasController::class, 'export'])->name('exportvitalitas')->middleware('mahasiswa');

	// Route::resource('/anomalimukosa', AnomalimukosaController::class);
	Route::get('/anomalimukosa', [AnomalimukosaController::class, 'index'])->name('anomalimukosa.index');
	Route::get('/anomalimukosa/create', [AnomalimukosaController::class, 'create'])->name('anomalimukosa.create')->middleware('mahasiswa');
	Route::post('/anomalimukosa', [AnomalimukosaController::class, 'store'])->name('anomalimukosa.store')->middleware('mahasiswa');
	Route::get('/anomalimukosa/{anomalimukosa}', [AnomalimukosaController::class, 'show'])->name('anomalimukosa.show');
	Route::get('/anomalimukosa/{anomalimukosa}/edit', [AnomalimukosaController::class, 'edit'])->name('anomalimukosa.edit')->middleware('mahasiswa');
	Route::put('/anomalimukosa/{anomalimukosa}', [AnomalimukosaController::class, 'update'])->name('anomalimukosa.update')->middleware('mahasiswa');
	Route::Delete('/anomalimukosa/{anomalimukosa}', [AnomalimukosaController::class, 'destroy'])->name('anomalimukosa.destroy')->middleware('mahasiswa');
	
	Route::put('/anomalimukosa/acc/{id}', [AnomalimukosaController::class, 'acc'])->name('anomalimukosa.acc')->middleware('pembimbing');

	Route::post('importanomalimukosa', [AnomalimukosaController::class, 'import'])->name('importanomalimukosa')->middleware('mahasiswa');
    Route::get('exportanomalimukosa', [AnomalimukosaController::class, 'export'])->name('exportanomalimukosa')->middleware('mahasiswa');

	
	// Route::resource('/periodontal', PeriodontalController::class);
	Route::get('/periodontal', [PeriodontalController::class, 'index'])->name('periodontal.index');
	Route::get('/periodontal/create', [PeriodontalController::class, 'create'])->name('periodontal.create')->middleware('mahasiswa');
	Route::post('/periodontal', [PeriodontalController::class, 'store'])->name('periodontal.store')->middleware('mahasiswa');
	Route::get('/periodontal/{periodontal}', [PeriodontalController::class, 'show'])->name('periodontal.show');
	Route::get('/periodontal/{periodontal}/edit', [PeriodontalController::class, 'edit'])->name('periodontal.edit')->middleware('mahasiswa');
	Route::put('/periodontal/{periodontal}', [PeriodontalController::class, 'update'])->name('periodontal.update')->middleware('mahasiswa');
	Route::Delete('/periodontal/{periodontal}', [PeriodontalController::class, 'destroy'])->name('periodontal.destroy')->middleware('mahasiswa');
	
	Route::put('/periodontal/acc/{id}', [PeriodontalController::class, 'acc'])->name('periodontal.acc')->middleware('pembimbing');

	Route::post('importperiodontal', [PeriodontalController::class, 'import'])->name('importperiodontal')->middleware('mahasiswa');
    Route::get('exportperiodontal', [PeriodontalController::class, 'export'])->name('exportperiodontal')->middleware('mahasiswa');

	// Route::resource('/diagnosa', DiagnosaController::class);
	Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
	Route::get('/diagnosa/create', [DiagnosaController::class, 'create'])->name('diagnosa.create')->middleware('mahasiswa');
	Route::post('/diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store')->middleware('mahasiswa');
	Route::get('/diagnosa/{diagnosa}', [DiagnosaController::class, 'show'])->name('diagnosa.show');
	Route::get('/diagnosa/{diagnosa}/edit', [DiagnosaController::class, 'edit'])->name('diagnosa.edit')->middleware('mahasiswa');
	Route::put('/diagnosa/{diagnosa}', [DiagnosaController::class, 'update'])->name('diagnosa.update')->middleware('mahasiswa');
	Route::Delete('/diagnosa/{diagnosa}', [DiagnosaController::class, 'destroy'])->name('diagnosa.destroy')->middleware('mahasiswa');
	
	Route::put('/diagnosa/acc/{id}', [DiagnosaController::class, 'acc'])->name('diagnosa.acc')->middleware('pembimbing');

	Route::post('importdiagnosa', [DiagnosaController::class, 'import'])->name('importdiagnosa')->middleware('mahasiswa');
    Route::get('exportdiagnosa', [DiagnosaController::class, 'export'])->name('exportdiagnosa')->middleware('mahasiswa');

	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::post('/getPatients', function (Request $request) {
		$user_id = $request->input('user_id');
		$pembimbing = $request->input('pembimbing');
	
		$options = getPatients($user_id, $pembimbing);
	
		return response()->json($options);
	});
	
});
