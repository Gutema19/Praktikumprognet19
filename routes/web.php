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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [loginctrl::class, 'index']);
Route::post('/logindt', [loginctrl::class, 'authenticate']);

Route::get('/regview', [regctrl1::class, 'index'])->middleware('guest')->name('register.request');
Route::post('/regdtpt1', [regctrl1::class, 'verification'])->middleware('guest')->name('register.verif');

Route::get('/verify', [verfy::class, 'index1'])->middleware('auth')->name('verif1.request');
Route::get('/verifyfpass', [verfy::class, 'index2'])->middleware('guest')->name('verif2.request');

Route::get('/fpassview', [fpassctrl1::class, 'index'])->middleware('guest')->name('password.request');
Route::post('/fpassmail', [fpassctrl1::class, 'mailv'])->middleware('guest')->name('password.email');

Route::get('/passview', [passctrl::class, 'index'])->middleware('guest')->name('forgot.password');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::post('/newpass', [npassctrl::class, 'npass'])->middleware('guest')->name('password.update');


Route::post('/verifmail', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
})->middleware('auth')->name('password.email');

Route::get('/logout', [logout::class, 'logout']);
