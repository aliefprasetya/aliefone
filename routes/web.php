<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
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
    return view('app');
});


//admin
//Route::middleware('auth')->group(function () {
    //Route::get('dashboard', [DashboardController::class , 'index']);
    //Route::post('logout', [LoginController::class , 'logout'])->name('logout');
    //Route::get('/mastersiswa/{id_siswa}/hapus', [SiswaController::class , 'hapus']);
    //Route::resource('mastersiswa', SiswaController::class);
    //Route::resource('masterproject', ProjectController::class);
    //Route::resource('masterkontak', KontakController::class);
//});

//guest
//Route::middleware('guest')->group(function () {
    //Route::get('login', [LoginController::class , 'index'])->name('login');
    //Route::post('login', [LoginController::class , 'authenticate'])->name('login.auth');
    //Route::get('/', function () { return view('home'); });
    //Route::get('/', function () { return view('about'); });
    //Route::get('/', function () { return view('project'); });
    //Route::get('/', function () { return view('contact'); });
//});

Route::get('example', [SiswaController::class, 'index'])->middleware('guest');
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
Route::resource('mastersiswa', SiswaController::class);//->middleware('auth');
Route::resource('masterproject', ProjectController::class);//->middleware('auth');
Route::resource('masterkontak', KontakController::class);//->middleware('auth');


Route::get('/', function () {
    return view('example');
});

Route::get('/dashboard', function () {
    return view('/dashboard');
 });

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/contact', function () {
    return view('contact');
});
