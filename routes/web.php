<?php


use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductVariansController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CartController;

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

Route::get('/', [App\Http\Controllers\client\HomeController::class, 'home']);


Route::get('/price_range', [App\Http\Controllers\client\HomeController::class, 'price_range'])->name('price_range');

Route::get('/home', [App\Http\Controllers\client\HomeController::class, 'home'])->name('homePage');
Route::get('/blog', function () {
   return view('client.blog');
});
Route::match(['POST', 'GET'], '/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/detail_product', [HomeController::class, 'ProductDetail'])->name('detail_product');

Route::get('/contact', function () {
   return view('client.contact');
});
Route::get('/detail_blog', function () {
   return view('client.detail_blog');
});


// account user
Route::get('/signup', function () {
   return view('auth.signup');
});
Route::get('/signin', function () {
   return view('auth.signin');
});

/* page profile */
route::middleware(['auth'])->group(function () {
   route::get('/account', [AddressController::class, 'showAccount'])->name('account');
   Route::post('/profile/update/{user}', [AddressController::class, 'updateProfile'])->name('profile.update');
   Route::post('/password/update', [AddressController::class, 'updatePassword'])->name('password.update');
   Route::get('/address', function () {
      return view('client.account.address');
   });
   Route::get('/address_add', function () {
      return view('client.account.address_add');
   });
   //order history
   route::get('/order_history', [AddressController::class, 'OrderHistory'])->name('order_history');
   Route::get('/orderDetailHome/{id}', [AddressController::class, 'orderDetailHome'])->name('orderDetailHome');
   Route::post('/orders/{order}/cancel', [AddressController::class, 'cancelOrder'])->name('orders.cancel');


   Route::get('/wishlist', function () {
      return view('client.account.wishlist');
   });
   Route::get('/promotion', function () {
      return view('client.account.promotion');
   });
});
//account admin
route::get('loginAdmin', [AdminController::class, 'login'])->name('login.admin');
route::post('loginAdmin', [AdminController::class, 'postlogin'])->name('admin.login');
route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

route::middleware(['admin'])->group(function () {
   route::prefix('admin')->group(function () {
      Route::get('/', function () {
         return view('admin.dashboard');
      })->name('admin.index');

      //products route
      route::resource('product', ProductsController::class);
      Route::post('/products/restore/{id}', [ProductsController::class,'restore'])->name('products.restore');

      //products variant route
      route::resource('productVariant', ProductVariansController::class);

      //category route 
      route::resource('category', CategoryController::class);
      //size
      route::resource('size', SizeController::class);

      //color
      route::resource('color', ColorController::class);

      //user route
      route::get('listUser', [UserController::class, 'index'])->name('listUser');
      route::get('listAdmin', [UserController::class, 'admin'])->name('listAdmin');

      //order route
      Route::get('/order', [OrderController::class, 'index'])->name('orderAdmin');
      Route::post('update_order_status/{order}', [OrderController::class, 'updateStatusOrder'])->name('admin.update_order_status');
      Route::get('order/{id}', [OrderController::class, 'orderDetail'])->name('order_detail');

      //voucher route
      Route::resource('voucher', VoucherController::class);
   });
});


//account user
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/signup', [SignUpController::class, 'showRegistrationForm'])->name('signup');
// Route xử lý đăng ký
Route::post('/signup', [SignUpController::class, 'signup']);
//delete acc
Route::get('/delete-account', [AccountController::class, 'showDeleteForm'])->name('account.delete');
Route::delete('/delete-account', [AccountController::class, 'delete'])->name('account.destroy');


//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.show');
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/data', 'CartController@getCartData')->name('cart.data');
Route::get('/get-total', 'CartController@getNewTotal')->name('get.total');
Route::post('/update-cart-total', 'CartController@updateCartTotal')->name('update.cart.total');



//comment
Route::post('/comments', [HomeController::class, 'createComment'])->name('comments.create');

//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');

//payment vnpay
Route::post('/vnpay', [PaymentController::class, 'Payment'])->name('vnpay_payment');
Route::get('/vnpay-return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return');
//voucher apply
Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('apply.discount');
Route::post('/cancel-discount', [CartController::class, 'cancelDiscount'])->name('cancel.discount');


Route::get('/thanks', function () {
   return view('client.thanks');
})->name('thanks');

Route::get('/chart', [ChartController::class,'viewChart'])->name('chart');

Route::get('/getchart', [ChartController::class,'chart'])->name('getchart');
Route::post('/doanhthu', [ChartController::class,'doanhThu'])->name('doanhThu');
Route::post('/donHang', [ChartController::class,'donHang'])->name('donHang');
// Route::get('/succer', function () {
//    return view('client.success');
// });
