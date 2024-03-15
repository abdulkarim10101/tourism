<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CountryController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('customer/login', [ShopController::class, 'getLogin'])->name('customer.getLogin');
Route::post('customer/login', [ShopController::class, 'login'])->name('customer.login');
Route::post('customer/signup', [ShopController::class, 'signup'])->name('customer.signup');
Route::get('customer/logout', [ShopController::class, 'logout'])->name('customer.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/crm', [HomeController::class, 'index'])->name('home');

    Route::get('customers1', [UserController::class, 'customers'])->name('customers.index');
    Route::resource('users', UserController::class);
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('promocodes', PromoCodeController::class);
    Route::resource('orderdetails', OrderDetailController::class);
    Route::resource('wishlist', WishlistController::class);
    Route::resource('excel', ExcelController::class);

    Route::put('changepassword/{id}', [UserController::class, 'updatepassword'])->name('users.updatepassword');
    Route::get('changepassword', [UserController::class, 'changepassword'])->name('users.changepassword');

    Route::get('customers/account_details', [CustomerController::class, 'account_details'])->name('customer.account_details');
    Route::get('customerss/account_information', [CustomerController::class, 'account_information'])->name('customer.account_information');
    Route::get('customers/myorders', [CustomerController::class, 'myorders'])->name('customer.myorders');
    Route::get('customers/wishlist', [CustomerController::class, 'wishlist'])->name('customer.wishlist');
    Route::get('customers/address_book', [CustomerController::class, 'address_book'])->name('customer.address_book');
    Route::get('customers/order_detail/{id}', [CustomerController::class, 'order_detail'])->name('customer.order_detail');
    Route::get('customers1/wishlist/{id}', [WishlistController::class, 'customerwishlist'])->name('customer.customerwishlist');

    Route::get('customers/changepassword', [CustomerController::class, 'getchangepassword'])->name('customer.getchangepassword');
    Route::post('customers/changepassword', [CustomerController::class, 'changepassword'])->name('customer.changepassword');
});

Route::resource('reviews', ReviewController::class);
Route::resource('scrapper', ScrapperController::class);
Route::resource('leads', LeadController::class);

Route::get('products1/aliexpress', [ProductController::class, 'aliexpress'])->name('products.aliexpress');

Route::get('wishlist/delete/{id}', [WishlistController::class, 'destroy'])->name('wishlist.delete');
Route::resource('checkout', CheckoutController::class);

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('shop', [ShopController::class, 'shop'])->name('shop.shop');
Route::get('shop/category/{slug}', [ShopController::class, 'productbycategory'])->name('shop.productbycategory');
Route::get('shop/product/{slug}', [ShopController::class, 'productdetail'])->name('shop.productdetail');
Route::post('addCoupon', [ShopController::class, 'addCoupon'])->name('shop.addCoupon');

Route::get('remove-from-cart/{id}', [CartController::class, 'getRemoveItem'])->name('cart.removeItem');
Route::get('increasebyone/{id}', [CartController::class, 'increaseByOne'])->name('cart.increasebyone');
Route::get('decreasebyone/{id}', [CartController::class, 'getReduceByOne'])->name('cart.decreasebyone');
Route::post('cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::post('cart/store1', [CartController::class, 'store1'])->name('cart.store1');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::post('changeorderstatus', [OrderController::class, 'changeorderstatus'])->name('changeorderstatus');
Route::get('orders/customer/{id}', [OrderController::class, 'customerorders'])->name('orders.customerorders');

Route::get('aboutus', [ShopController::class, 'aboutus'])->name('aboutus');
Route::get('contact', [ShopController::class, 'contact'])->name('contact');
Route::post('contactp', [ShopController::class, 'sendMail'])->name('contactpost');

Route::get('countries', [CountryController::class, 'getAllCountries'])->name('country.getAllCountries');

Route::view('/admin/login', 'auth.login');
Route::view('/aboutus', 'frontend.aboutus')->name('giftoliaa.aboutus');
Route::view('/blog', 'frontend.blog')->name('giftoliaa.blog');
Route::view('/cart1', 'frontend.cart')->name('giftoliaa.cart');
Route::view('/checkout1', 'frontend.checkout')->name('giftoliaa.checkout');
Route::view('/faq', 'frontend.faq')->name('giftoliaa.faq');
Route::view('/shop1', 'frontend.shop')->name('giftoliaa.shop');

Route::get('/search/autocomplete', [SearchController::class, 'autocomplete'])->name('search.autocomplete');
