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
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\HomeController;

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

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes(['verify' => true]);

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest')->name('landingpg');

    // Route untuk login
    Route::get('/login_user', [loginctrl::class, 'index'])->middleware('guest')->name('user_login'); // menampilkan halaman User login
    Route::post('/logindt', [loginctrl::class, 'adminauth']); // transfer data user login
    //Route::get('/admin', [loginctrl::class, 'index1'])->name('admin_login'); // menampilkan halaman Admin login

    // Route untuk registrasi
    Route::get('/register_user', [regctrl1::class, 'index'])->middleware('guest')->name('register.request'); // menampilkan halaman User Registration
    Route::post('/regdtpt1', [regctrl1::class, 'verification'])->middleware('guest')->name('register.verif'); // transfer data Admin Resgitration

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


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('homeuser');


    // Route untuk Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('guest:admin')->group(function () {
            Route::get('/', [loginctrl::class, 'index1'])->name('admin_login'); // menampilkan halaman Admin login
            Route::post('/adminlogindt', [loginctrl::class, 'adminauth']); // validasi data login
            Route::get('/adminregview', [regctrl1::class, 'index2'])->name('adminregister.request'); // menampilkan halaman Admin Registration
            Route::post('/regdtpt2', [regctrl1::class, 'adminregis'])->name('adminregister.verif'); // transfer data Admin Resgitration
        });
        Route::middleware('auth:admin')->group(function () {
            Route::get('/homeadmin', [App\Http\Controllers\HomeController::class, 'index1'])->name('home_admin'); // menampilkan halaman admin
            Route::get('/logoutadmin', [logout::class, 'logout1'])->name('adminlogout'); // Log out Admin

            // Route modul 2 tulis disini ya..

            //Kategori Route
            Route::get('kategori/list', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('listkategori');
            Route::get('kategori/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('addkategori');
            Route::post('kategori', [App\Http\Controllers\Admin\CategoryController::class, 'addprocess']);
            Route::get('kategori/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
            Route::patch('kategori/editproses/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editprocess']);
            Route::delete('kategori/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
            
            //Detail Kategori Route
            Route::get('detailkategori/list', [App\Http\Controllers\Admin\DetailCategoryController::class, 'index'])->name('listdetcategory');
            Route::get('detailkategori/add', [App\Http\Controllers\Admin\DetailCategoryController::class, 'add'])->name('adddetailkategori');
            Route::post('detailkategori', [App\Http\Controllers\Admin\DetailCategoryController::class, 'addprocess']);
            Route::get('detailkategori/edit/{id}', [App\Http\Controllers\Admin\DetailCategoryController::class, 'edit']);
            Route::patch('detailkategori/editproses/{id}', [App\Http\Controllers\Admin\DetailCategoryController::class, 'editprocess']);
            Route::delete('detailkategori/{id}', [App\Http\Controllers\Admin\DetailCategoryController::class, 'delete']);
            
            //Product Route
            Route::get('product', [ProductController::class, 'index'])->name('listproduct');
            Route::get('product/add', [ProductController::class, 'add']);
            Route::post('product', [ProductController::class, 'addprocess']);
            Route::get('product/edit/{id}',[ProductController::class, 'edit']);
            Route::patch('product/editproses/{id}', [ProductController::class, 'editprocess']);
            Route::delete('product/{id}', [ProductController::class, 'delete']);
            
            //Admin Route
            Route::get('/list', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('listadmin');
            Route::get('/add', [App\Http\Controllers\Admin\AdminController::class, 'add'])->name('addadmin');
            Route::post('/admin', [App\Http\Controllers\Admin\AdminController::class, 'addprocess']);
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit']);
            Route::patch('/editproses/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editprocess']);
            Route::delete('/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete']);
            
            //Courier Route
            Route::get('/courier', [CourierController::class, 'index'])->name('listcourier');
            Route::get('courier/add', [CourierController::class, 'add'])->name('addcourier');
            Route::post('/courier', [CourierController::class, 'addprocess']);
            Route::get('courier/edit/{id}', [CourierController::class, 'edit']);
            Route::patch('courier/editprocess/{id}', [CourierController::class, 'editprocess']);
            Route::delete('/courier/{id}', [CourierController::class, 'delete']);
            
            });
            
        
        
        });

        // Route untuk logout
        Route::get('/logout', [logout::class, 'logout']); // Log out User



    });
