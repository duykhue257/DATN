<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/home', function () {
    return view('client.homepage');
});
Route::get('/blog', function () {
    return view('client.blog');
});
Route::get('/shop', function () {
   return view('client.shop');
});
Route::get('/detail_product', function () {
    return view('client.detail_product');
 });
 Route::get('/cart', function () {
    return view('client.cart');
 });
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
 Route::get('/admin/dashboard', function () {
   return view('admin.dashboard');
});
Route::get('/admin/product/list', function () {
   return view('admin.dashboard');
});
Route::get('/admin/product/add', function () {
   return view('admin.product.create_product');
});
Route::get('/admin/product/edit', function () {
   return view('admin.product.edit_product');
});
Route::get('/admin/cate/list', function () {
   return view('admin.category.list_cate');
});
Route::get('/admin/cate/add', function () {
   return view('admin.category.create_cate');
});
Route::get('/admin/cate/edit', function () {
   return view('admin.category.edit_cate');
});
Route::get('/admin/profile', function () {
   return view('admin.profile.list_profile');
});
Route::get('/admin/profile/edit', function () {
   return view('admin.profile.update_profile');
});