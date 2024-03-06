<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\CartController;
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
   return view('welcome');
});

Route::get('/home', [App\Http\Controllers\client\HomeController::class,'home'])->name('homePage');
Route::get('/blog', function () {
   return view('client.blog');
});
// Route::get('/shop', [App\Http\Controllers\client\HomeController::class,'shop']);
Route::match(['POST', 'GET'], '/shop', [App\Http\Controllers\client\HomeController::class, 'shop']);
Route::get('/detail_product', [App\Http\Controllers\client\HomeController::class,'ProductDetail'])->name('detail_product');
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class, 'addToCart'])->name('cart.store');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/checkout', function () {
   return view('client.checkout');
});
Route::get('/contact', function () {
   return view('client.contact');
});
Route::get('/detail_blog', function () {
   return view('client.detail_blog');
});

Route::get('/signup', function () {
   return view('auth.signup');
});
Route::get('/signin', function () {
   return view('auth.signin');
});
route::middleware(['auth'])->group(function () {
   route::prefix('admin')->group(function () {
      Route::get('/', function () {
         return view('admin.home');
      })->name('admin.index');
      //products route
      route::resource('product', \App\Http\Controllers\ProductsController::class);
      //products variant route
      route::resource('productVariant', \App\Http\Controllers\ProductVariansController::class);
      //category route 
      route::resource('category', \App\Http\Controllers\CategoryController::class);
      //user route
      route::get('listUser',[\App\Http\Controllers\UserController::class,'index'])->name('listUser');
   });
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/signin', 'AuthController@login')->name('signin');
// Route hiển thị form đăng ký
Route::get('/signup', [SignUpController::class, 'showRegistrationForm'])->name('signup');
// Route xử lý đăng ký
Route::post('/signup', [SignUpController::class, 'signup']);

