<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PageController;
use App\Http\Controllers\HouseholdgoodsController;
=======
>>>>>>> 450ec7f43bc7240278949fa9bc320798eef017f3

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

<<<<<<< HEAD
Route::resource('products', '\App\Http\Controllers\AdminController');

/*
cez href sa da odkazat ako : href="{{ URL::route('home') }}"
*/
Route::get('/', [PageController::class, 'mainpage']);

Route::get('/pages/form', array('as' => 'form', function () {
    return view('pages.page.form');
}));

Route::get('/householdgoods', [PageController::class, 'householdgoods']);

Route::get('/pages/checkout', array('as' => 'checkout', function () {
    return view('pages.page.checkout');
}));

Route::get('/admin', array('as' => 'admin', function () {
    return view('layout.adminpage');
}));
=======
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




>>>>>>> 450ec7f43bc7240278949fa9bc320798eef017f3
