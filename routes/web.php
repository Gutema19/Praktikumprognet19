<?php

use Illuminate\Http\Request;
use App\Http\Controllers\verfy;
use App\Http\Controllers\logout;
use App\Http\Controllers\passctrl;
use App\Http\Controllers\regctrl1;
use App\Http\Controllers\loginctrl;
use App\Http\Controllers\npassctrl;
use App\Http\Controllers\fpassctrl1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DetailCategoryController;
use App\Http\Controllers\Admin\TransactionResourceController;

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

// Route Product untuk guests dan auth
Route::get('product/{product}', [ProductUserController::class, 'show'])->name('product.show');      

// Route untuk Admin
Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::middleware('guest:admin')->group(function () {
        // Admin sebelum login
        Route::get('/', [loginctrl::class, 'index1'])->name('admin_login'); 
        Route::post('/adminlogindt', [loginctrl::class, 'adminauth']);
        Route::get('/adminregview', [regctrl1::class, 'index2'])->name('adminregister.request');
        Route::post('/regdtpt2', [regctrl1::class, 'adminregis'])->name('adminregister.verif');
    });

    // Admin akses setelah login
    Route::middleware('auth:admin')->group(function () {
        Route::get('/homeadmin', [App\Http\Controllers\HomeController::class, 'index1'])->name('home_admin'); // menampilkan halaman admin
        Route::get('/logoutadmin', [logout::class, 'logout1'])->name('adminlogout'); // Log out Admin

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
        
        // Admin List
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
        
         //Transaction Route
        Route::resource('transaction', TransactionResourceController::class);
        Route::post('transaction/{transaction}/accept', [TransactionResourceController::class, 'acceptPayment'])->name('transaction.accept');
        Route::post('transaction/{transaction}/shipped', [TransactionResourceController::class, 'updateShipped'])->name('transaction.shipped');
        Route::post('transaction/{transaction}/cancel', [TransactionResourceController::class, 'cancelTransaction'])->name('transaction.cancel');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homeuser');
    
    // Route untuk verifikasi email
    Route::get('/verify', [verfy::class, 'index1'])->middleware('auth')->name('verif1.request');
    Route::post('/verifmail', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
    })->name('password.email');

    // Route untuk logout
    Route::get('/logout', [logout::class, 'logout']);
    
    // Route Cart
    Route::view('cart', 'user.cart.index')->name('cart');
    Route::view('checkout', 'user.checkout')->name('checkout');
    
    // Route Product
    // Route::view('product', 'user.product-detail')->name('product'); // digunakan kalo mau semua livewire
    Route::post('product/{product}/review', [ProductUserController::class, 'storeReview'])->name('review.store');
    Route::get('product/{product}/buy-now', [ProductUserController::class, 'buyNow'])->name('product.buynow');

    // Route Payment
    Route::get('payment/{transaction}', [TransactionController::class, 'payment'])->name('payment');
    Route::post('payment/{transaction}/proof_payment', [TransactionController::class, 'uploadProofPayment'])->name('proof_payment');
    Route::post('payment/{transaction}', [TransactionController::class, 'deleteTransaction'])->name('delete-transaction');

    // Route My Transaction
    Route::get('my-transaction', [OrderUserController::class, 'index'])->name('my-transaction');

});

Route::middleware('guest')->group(function () {
    
    // Root website
    Route::view('/', 'homepage')->name('landingpg');

    // Sebelum Login
    Route::get('/login_user', [loginctrl::class, 'index'])->name('user_login'); 
    Route::post('/logindt', [loginctrl::class, 'adminauth']); 

    // Registrasi User
    Route::get('/register_user', [regctrl1::class, 'index'])->name('register.request');
    Route::post('/regdtpt1', [regctrl1::class, 'verification'])->name('register.verif'); 
    Route::get('/verifyfpass', [verfy::class, 'index2'])->name('verif2.request');

    // User Lupa Password
    Route::get('/fpassview', [fpassctrl1::class, 'index'])->name('password.request');
    Route::post('/fpassmail', [fpassctrl1::class, 'mailv'])->name('password.email');
    Route::post('/newpass', [npassctrl::class, 'npass'])->name('password.update');
    Route::get('/passview', [passctrl::class, 'index'])->name('forgot.password');

    //Admin Lupa Password
    Route::get('/adminfpassview', [fpassctrl1::class, 'index1'])->name('adminpassword.request');
    Route::post('/fpassadmin', [fpassctrl1::class, 'adminv'])->name('password.email');
    Route::get('/npassview', [npassctrl::class, 'index1'])->name('anewpassword.request');
});

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes(['verify' => true]);
});