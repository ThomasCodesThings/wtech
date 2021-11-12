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

Route::resource('products', '\App\Http\Controllers\ProductController');

/*
cez href sa da odkazat ako : href="{{ URL::route('home') }}"
*/
Route::get('/', array('as' => 'home', function () {
    return view('pages.page.home');
}));

Route::get('/pages/form', array('as' => 'form', function () {
    return view('pages.page.form');
}));


Route::get('/pages/checkout', array('as' => 'checkout', function () {
    return view('pages.page.checkout');
}));

Route::get('/admin', array('as' => 'admin', function () {
    return view('layout.adminpage');
}));
