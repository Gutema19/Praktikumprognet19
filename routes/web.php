<?php

use Illuminate\Http\Request;
use App\Http\Controllers\loginctrl;
use App\Http\Controllers\regctrl1;
use App\Http\Controllers\fpassctrl1;
use App\Http\Controllers\passctrl;
use App\Http\Controllers\npassctrl;
use App\Http\Controllers\logout;
use App\Http\Controllers\verfy;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
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



// Route untuk login
Route::get('/user', [loginctrl::class, 'index'])->middleware('guest')->name('user_login'); // menampilkan halaman User login
Route::post('/logindt', [loginctrl::class, 'authenticate']); // transfer data user login
//Route::get('/admin', [loginctrl::class, 'index1'])->name('admin_login'); // menampilkan halaman Admin login

// Route untuk registrasi
Route::get('/regview', [regctrl1::class, 'index'])->middleware('guest')->name('register.request'); // menampilkan halaman User Registration
Route::post('/regdtpt1', [regctrl1::class, 'verification'])->middleware('guest')->name('register.verif'); // transfer data Admin Resgitration
Route::get('/adminregview', [regctrl1::class, 'index2'])->middleware('guest')->name('adminregister.request'); // menampilkan halaman Admin Registration
Route::post('/regdtpt2', [regctrl1::class, 'adminregis'])->middleware('guest')->name('adminregister.verif'); // transfer data Admin Resgitration

// Route untuk verifikasi
Route::get('/verify', [verfy::class, 'index1'])->middleware('auth')->name('verif1.request');
Route::get('/verifyfpass', [verfy::class, 'index2'])->middleware('guest')->name('verif2.request');
Route::post('/verifmail', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
})->middleware('auth')->name('password.email');

// Route untuk lupa password
// User Lupa Password
Route::get('/fpassview', [fpassctrl1::class, 'index'])->middleware('guest')->name('password.request');
Route::post('/fpassmail', [fpassctrl1::class, 'mailv'])->middleware('guest')->name('password.email');
Route::post('/newpass', [npassctrl::class, 'npass'])->middleware('guest')->name('password.update');

//Admin Lupa Password
Route::get('/adminfpassview', [fpassctrl1::class, 'index1'])->middleware('guest')->name('adminpassword.request');
Route::post('/fpassadmin', [fpassctrl1::class, 'adminv'])->middleware('guest')->name('password.email');
Route::get('/npassview', [npassctrl::class, 'index1'])->middleware('guest')->name('anewpassword.request');

// Route untuk password
Route::get('/passview', [passctrl::class, 'index'])->middleware('guest')->name('forgot.password');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('homeuser');

/*Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('guest')->group(function () {

    });
    Route::middleware('auth')->group(function () {

    });
});*/


// Route untuk Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/', [loginctrl::class, 'index1'])->name('admin_login'); // menampilkan halaman Admin login
        Route::post('/adminlogindt', [loginctrl::class, 'adminauth']); // validasi data login
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/homeadmin', [App\Http\Controllers\HomeController::class, 'index1'])->name('homeadmin'); // menampilkan halaman admin
        Route::get('/logoutadmin', [logout::class, 'logout1'])->name('adminlogout'); // Log out Admin
    });
});

// Route untuk logout
Route::get('/logout', [logout::class, 'logout']); // Log out User
