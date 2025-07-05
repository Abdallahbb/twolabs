<?php

use App\Http\Controllers\Appointments;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cart;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Orders;
use App\Http\Controllers\Products;
use App\Http\Controllers\User;
use App\Models\Appointment;
use App\Models\Product;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::get('/services',[User::class,'services'])->name('services');


Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/loginaction',[AuthController::class, 'login'])->name('loginaction');
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registeraction',[AuthController::class, 'register'])->name('registeraction');



Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/contact',function(){
    return view('contact');
})->name('contact');





Route::middleware('auth')->group(function (){
    Route::get('book',[Appointments::class, 'show'])->name('book');
    Route::get('user_dashboard',[User::class, 'index'])->name('user_dashboard');
    Route::get('user-order-details/{slug}',[User::class, 'userOrderDetails'])->name('user-order-details');
    Route::post('bookAppointment',[Appointments::class, 'create'])->name('bookAppointment');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('product/{id}',[Products::class, 'single'])->name('product');
Route::get('cart',[Cart::class, 'index'])->name('cart');
Route::post('add-to-cart', [Cart::class, 'addToCart'])->name('addToCart');
Route::post('updatecart', [Cart::class, 'updatecart'])->name('updatecart');
Route::post('cartplus', [Cart::class, 'cartplus'])->name('cartplus');
Route::post('cartminus', [Cart::class, 'cartminus'])->name('cartminus');
Route::get('deleteCart/{id}', [Cart::class, 'destroy'])->name('deleteCart');
Route::post('checkout', [Cart::class, 'checkout'])->name('checkout');
Route::get('/payment/callback', [Cart::class, 'handleCallback'])->name('payment.callback');


Route::post('approveOrder', [Orders::class, 'approveOrder'])->name('approveOrder');

Route::get('shops-product',[Products::class,'index'])->name('shops-product');

Route::get('/add',function(){
    return view('add');
})->name('add');

Route::get('edit-product/{id}',[Products::class,'show'])->name('edit-product');
Route::post('update-product',[Products::class,'update'])->name('update-product');

Route::get('/appointments',[Appointments::class, 'index'])->name('appointments');
Route::post('/approve',[Appointments::class, 'approve'])->name('approve');
Route::post('/decline',[Appointments::class, 'decline'])->name('decline');
Route::get('/dashboard',[Dashboard::class, 'index'])->name('dashboard');
Route::post('/confirm-order', [Dashboard::class, 'confirmOrder'])->name('confirm-order');
Route::post('/cancel-order', [Dashboard::class, 'cancelOrder'])->name('cancel-order');




Route::get('/pending-orders',[Orders::class,'index'])->name('pending_orders');
Route::get('/completed-orders',[Orders::class,'complete'])->name('orders');
Route::get('/order-details/{slug}',[Orders::class,'details'])->name('order-details');


Route::post('/addproduct',[Products::class, 'addProduct'])->name('addproduct');