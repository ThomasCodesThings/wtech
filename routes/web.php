<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HouseholdgoodsController;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\ToiletriesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;

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

Route::resource('products', '\App\Http\Controllers\AdminController')->middleware(['auth.admin.panel']);
Route::delete('/deleteImage/{product}/{image}', [AdminController::class, 'deleteImage'])->name('delete')->middleware(['auth.admin.panel']);
Route::resource('coupons', '\App\Http\Controllers\CouponController')->middleware(['auth.admin.panel']);
Route::resource('checkouts', '\App\Http\Controllers\CheckoutController');

Route::get('/', [PageController::class, 'mainpage']);
Route::get('/search', [PageController::class, 'search']);
Route::get('/category', [PageController::class, 'index']);
Route::get('/{type}/{id}', [PageController::class, 'show_category'])->whereNumber('id');
Route::get('/{id}', [PageController::class, 'show'])->whereNumber('id');


#Route::post('householdgoods-sort', [HouseholdgoodsController::class, 'sort'])->name('householdgoods.display');

/*Route::post('/householdgoods/ascending', [HouseholdgoodsController::class, 'filter']);
Route::post('/householdgoods/descending', [HouseholdgoodsController::class, 'filter']);*/
//Route::get('/householdgoods/ascending', [HouseholdgoodsController::class, 'ascendingOrder'])->name('ascending');
//Route::get('/householdgoods/descending', [HouseholdgoodsController::class, 'descendingOrder'])->name('descending');


Route::get('/pages/form', array('as' => 'form', function () {
    return view('pages.page.form');
}));

Route::get('/pages/checkout', array('as' => 'checkout', function () {
    return view('pages.page.checkout');
}));

Route::get('/admin',  function () {
    return view('layout.adminpage');
})->middleware(['auth.admin.panel']);

Route::view('/login', 'auth.login');

Route::resource('checkouts', CheckoutController::class);

Route::get('/dashboard', function () {
    return view('pages.page.message')->with('message',"Succesfully logged in!");
})->middleware(['auth'])->name('dashboard');

Route::get('/cart', [CartController::class, 'show'])->name('display-cart');
Route::post('/add-to-cart', [CartController::class, 'add'])->name('add-to-cart');
Route::post('cart', [CartController::class, 'update'])->name('update-cart');
Route::post('cart/delete', [CartController::class, 'delete'])->name('delete-product-from-cart');

require __DIR__.'/auth.php';
