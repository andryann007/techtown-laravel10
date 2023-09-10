<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('public.home', [
        'title' => 'Home'
    ]);
});


Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/authentikasi', [LoginController::class, 'authenticate']);
Route::get('/admin/register', [LoginController::class, 'register']);
Route::post('/admin/register_akun', [LoginController::class, 'register_account']);
Route::get('/admin/forget', [LoginController::class, 'forget_password'])->middleware('guest')->name('password.email');
Route::post('/admin/send_token', [LoginController::class, 'send_reset_token'])->middleware('guest')->name('password.email');
Route::get('/admin/reset/{token}', function (string $token) {
    return view('auth.reset_password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/admin/reset_password', [LoginController::class, 'reset_account_password'])->middleware('guest')->name('password.update');
// Route::get('/admin/reset/{token}', [LoginController::class, 'reset_password'])->middleware('guest')->name('password.reset');
Route::post("/admin/logout", [LoginController::class, 'logout']);

Route::get('/admin/akun', [UserController::class, 'get'])->middleware('auth');
Route::post('/admin/save_akun', [UserController::class, 'insert']);
Route::post('/admin/update_akun', [UserController::class, 'update']);
Route::post('/admin/delete_akun', [UserController::class, 'delete']);

Route::get('/admin/kategori', [KategoriController::class, 'get'])->middleware('auth');
Route::post('/admin/save_kategori', [KategoriController::class, 'insert']);
Route::post('/admin/update_kategori', [KategoriController::class, 'update']);
Route::post('/admin/delete_kategori', [KategoriController::class, 'delete']);

Route::get('/admin/brand', [BrandController::class, 'get'])->middleware('auth');
Route::post('/admin/save_brand', [BrandController::class, 'insert']);
Route::post('/admin/update_brand', [BrandController::class, 'update']);
Route::post('/admin/delete_brand', [BrandController::class, 'delete']);

Route::get('/admin/produk', [ProdukController::class, 'get'])->middleware('auth');
Route::post('/admin/save_produk', [ProdukController::class, 'insert']);
Route::post('/admin/update_produk', [ProdukController::class, 'update']);
Route::post('/admin/delete_produk', [ProdukController::class, 'delete']);

Route::get('/admin/produk/detail', [ProdukController::class, 'detail'])->middleware('auth');
Route::post('/admin/produk/save_detail', [ProdukController::class, 'insert_detail']);
Route::post('/admin/produk/update_detail', [ProdukController::class, 'update_detail']);

Route::get('/admin/contact', [ContactController::class, 'get'])->middleware('auth');
Route::post('/send_message', [ContactController::class, 'insert']);
Route::post('/admin/reply_message', [ContactController::class, 'reply']);
Route::post('/admin/delete_message', [ContactController::class, 'delete']);

Route::get('/admin/my_profile', [UserController::class, 'my_profile'])->middleware('auth');
Route::post('/admin/update_profile', [UserController::class, 'update_profile'])->middleware('auth');
