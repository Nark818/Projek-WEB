<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home',[HomeController::class, 'home']);

Route::get('/dashboard',[HomeController::class, 'login_home'])->
    middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders',[HomeController::class, 'myorders'])->
    middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//-------------------------------------ADMIN------------------------------------------------------//

Route::get('admin/dashboard',[HomeController::class, 'index'])->
    middleware(['auth', 'admin']);

Route::get('admin/dashboard',[AdminController::class, 'total_users'])->
    middleware(['auth', 'admin']);

Route::get('manage_user',[AdminController::class, 'view_user'])->
    middleware(['auth', 'admin']);

Route::get('delete_user/{id}',[AdminController::class, 'delete_user'])->
    middleware(['auth', 'admin']);

Route::get('update_user/{id}',[AdminController::class, 'update_user'])->
    middleware(['auth', 'admin']);

Route::post('edit_user/{id}',[AdminController::class, 'edit_user'])->
    middleware(['auth', 'admin']);

Route::get('search_user', [AdminController::class,'search_user'])->
    middleware(['auth', 'admin']);

//Kategori
Route::get('view_category', [AdminController::class,'view_category'])->
    middleware(['auth', 'admin']);
    
Route::post('add_category', [AdminController::class,'add_category'])->
    middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class,'detele_category'])->
    middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class,'edit_category'])->
    middleware(['auth', 'admin']);

Route::post('update_category/{id}', [AdminController::class,'update_category'])->
    middleware(['auth', 'admin']);

Route::get('create_user', [AdminController::class,'create_user'])->
    middleware(['auth', 'admin']);

Route::post('upload_user', [AdminController::class, 'upload_user'])->
    middleware(['auth', 'admin']);

Route::post('upload_user', [AdminController::class,'upload_user'])->
    middleware(['auth', 'admin']);

Route::get('manage_produk', [AdminController::class,'manage_produk'])->
    middleware(['auth', 'admin']);

Route::get('del_produk/{id}', [AdminController::class,'del_produk']);

//-------------------------------------SELLER------------------------------------------------------//

//Route Untuk Seller
Route::get('seller/dashboard', [HomeController::class,'seller_dashboard'])->
    middleware(['auth', 'seller']);

//Tambah Toko
Route::get('seller/add_store', [SellerController::class,'add_store'])->
    middleware(['auth', 'seller']);

Route::post('save_store', [SellerController::class,'save_store'])->
    middleware(['auth', 'seller']);

//Tambah Produk
Route::get('add_produk', [SellerController::class,'add_produk'])->
    middleware(['auth', 'seller']);

Route::post('upload_produk', [SellerController::class,'upload_produk'])->
    middleware(['auth', 'seller']);

//Melihat Produk
Route::get('view_produk', [SellerController::class,'view_produk'])->
    middleware(['auth', 'seller']);

//menghapus Produk
Route::get('delete_produk/{id}', [SellerController::class,'delete_produk'])->
    middleware(['auth', 'seller']);

//Memperbarui Produk
Route::get('edit_produk/{id}', [SellerController::class,'edit_produk'])->
    middleware(['auth', 'seller']);

Route::post('update_produk/{id}', [SellerController::class,'update_produk'])->
    middleware(['auth', 'seller']);

//Mencari
Route::get('search_produk', [SellerController::class,'search_produk'])->
    middleware(['auth', 'seller']);

Route::get('view_orders', [SellerController::class,'view_order'])->
    middleware(['auth', 'seller']);

Route::get('on_the_way/{id}', [SellerController::class,'on_the_way'])->
    middleware(['auth', 'seller']);

Route::get('delivered/{id}', [SellerController::class,'delivered'])->
    middleware(['auth', 'seller']);

Route::get('edit_store', [SellerController::class,'edit_store'])->
    middleware(['auth', 'seller']);

Route::post('update_store/{id}', [SellerController::class, 'update_store'])
    ->middleware(['auth', 'seller']);

//-------------------------------------PRODUK------------------------------------------------------//
Route::get('produk_details/{id}', [HomeController::class, 'produk_details']);
    
Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->
    middleware(['auth', 'verified']);

Route::get('mycart', [HomeController::class, 'mycart'])->
    middleware(['auth', 'verified']);

Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->
    middleware(['auth', 'verified']);

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->
    middleware(['auth', 'verified']);

Route::get('myfavorite', [HomeController::class, 'view_favorite'])->
    middleware(['auth', 'verified']);

Route::get('add_favorite/{id}', [HomeController::class, 'add_favorite'])->
    middleware(['auth', 'verified']);

Route::get('delete_favorite/{id}', [HomeController::class, 'delete_favorite'])->
    middleware(['auth', 'verified']);

Route::get('search_produk', [HomeController::class, 'search_produk']);

Route::get('find_produk', [HomeController::class, 'find_produk']);



