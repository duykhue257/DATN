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
