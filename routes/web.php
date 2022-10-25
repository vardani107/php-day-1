<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\JContactController;

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

// 
// Route::get('/master_siswa' , function(){
//     return view('mastersiswa');
// });

// Route::get('/master_project', function () {
//     return view('masterproject');
// });

// Route::get('/master_contact', function () {
//     return view('mastercontact');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/forgot_password', function () {
//     return view('masuk.fp');
// });

// Route::get('/register', function () {
//     return view('masuk.register');
// });

// Route::get('/login', function () {
//     return view('masuk.login');
// });

// Route::get('/dashboard', 'DashboardController@index');


// 
route::middleware('guest')->group(function () {
    Route::get('login', [Logincontroller::class, 'index'])->name('login')->middleware('guest');
    Route::post('login', [Logincontroller::class, 'authenticate']);

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/admin', function () {
        return view('master.admin');
    });

    Route::get('/about', function () {
        return view('aboutme');
    });

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/project', function () {
        return view('project');
    });

    route::get('/master_contact', function () {
        return view('master_contact');
    });
});


// 
route::middleware(['auth', 'siswa'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('master_siswa', SiswaController::class);
    Route::resource('master_project', ProjectController::class);
    Route::resource('master_contact', ContactController::class);
    Route::resource('jenis_kontak', JContactController::class);
    // route::resource('master_contact' )

    Route::get('master_siswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('master_siswa.hapus');
    
    Route::get('master_project/create/{id_siswa}', [ProjectController::class, 'tambah'])->name('master_project.tambah');
    Route::get('master_project/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('master_project.hapus');
    // // Route::get('jenis_kontak/{id_siswa}/hapus', [JContactController::class, 'hapus'])->name('Jcontact.hapus');
    // Route::get('jenis_kontak/hapus', [JContactController::class, 'hapus'])->name('jenis_kontak.hapus');
    // // Route::get('jenis_kontak/create/{id_siswa}', [JContactController::class, 'tambah'])->name('jenis_kontak.tambah');

    Route::post('logout', [Logincontroller::class, 'logout']);
});
