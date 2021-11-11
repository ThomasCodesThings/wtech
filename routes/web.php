<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/craft', function () {
    return view('craft');
});


Route::get('/formular', function () {
    return view('formular');
});


Route::get('/', function () {
    return view('home');
});


Route::get('/householdgoods', function () {
    return view('householdgoods');
});


Route::get('/checkout', function () {
    return view('checkout');
});


Route::get('/product', function () {
    return view('product');
});


Route::get('/toiletries', function () {
    return view('toiletries');
});




