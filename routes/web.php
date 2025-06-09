<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//Checkout

Route::get('/admin/print/bill/{bill_id}', [CheckoutController::class, 'printBill'])->name('admin.print.bill');
Route::post('/user/checkout',[CheckoutController::class,'usercheckout'])->name('usercheckout');
Route::post('/user/savebill',[CheckoutController::class,'savebill'])->name('savebill');
Route::get('/user/checkouthistory/{u_id}',[CheckoutController::class,'checkouthistory'])->name('checkouthistory');
Route::get('/admin/bills',[CheckoutController::class,'adminbills'])->name('admin.bills');
Route::get('/admin/billbyuser/{id}',[CheckoutController::class,'billbyuser'])->name('billbyuser');
Route::get('/admin/billdetails/{bill_id}',[CheckoutController::class,'adminbilldetails'])->name('admin.billdetails');

// Cart
Route::get('/user/cart',[CartController::class,'usercart'])->name('cart');
Route::get('/cart/delete/{id}',[CartController::class,'deletecart'])->name('deletecart');
Route::get('/addtocart/{product_id}/{user_id}',[CartController::class,'addtocart'])->name('addtocart');

//Wishlist
Route::get('/addtowishlist/{product_id}/{user_id}',[WishlistController::class,'addtowishlist'])->name('addtowishlist');
Route::get('/user/wishes',[WishlistController::class,'userwish'])->name('userwish');
Route::get('/delete/wish/{id}',[WishlistController::class,'deletewish'])->name('deletewish');

Route::get('/user/detail', function () {return view( 'user.pages.detail');})->name('detail');

Route::controller(MyController::class)->group(function(){
    Route::get('/user/index','index')->name('index');
    Route::get('/user/productsearch','productsearch')->name('productsearch');
    Route::get('/user/productview/{id}','productview')->name('productview');
    Route::get('/user/shop','allproducts')->name('shop');
    Route::get('/admin/dashboard','adminindex')->name('admin.dashboard');
    Route::get('/user/productbycat/{id}','productbycat')->name('productbycat');
    Route::get('/admin/users','adminusers')->name('admin.users');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('/user/contact','index')->name('contact');
    Route::post('/user/contact/store','addcontact')->name('contact.store');
    Route::get('/admin/contact','show')->name('admin.contact');
    Route::get('/admin/contact/delete/{id}','delete')->name('admin.contact.delete');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/category','admincategory')->name('admin.category');
    Route::get('/admin/addcategory','categoryform')->name('admin.addcategorypage');
    Route::post('/admin/addcategory','addcategory')->name('admin.addcategory');
    Route::get('/admin/editcategory/{id}','editcategory')->name('admin.editcategory');
    Route::put('/admin/updatecategory/{id}','updatecat')->name('admin.updatecat');
    Route::get('/admin/deletecategory/{id}','deletecategory')->name('admin.deletecategory');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/product','adminproduct')->name('admin.product');
    Route::get('/admin/product','adminproduct')->name('admin.product');
    Route::get('/admin/productform','productform')->name('admin.productform');
    Route::post('/admin/addproduct','addproduct')->name('admin.addproduct');
    Route::get('/admin/editproduct/{id}','editproduct')->name('admin.editproduct');
    Route::put('/admin/updateproduct/{id}','updateproduct')->name('admin.updateproduct');
    Route::get('/admin/deleteproduct/{id}','deleteproduct')->name('admin.deleteproduct');
});


Auth::routes(
    [
        'login' => false, // disable default login
    ]
);
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
