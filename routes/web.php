<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HouseholdgoodsController;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\ToiletriesController;
use App\Http\Controllers\CartController;

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

Route::resource('products', '\App\Http\Controllers\AdminController');

Route::get('/', [PageController::class, 'mainpage']);

Route::get('/householdgoods', [HouseholdgoodsController::class, 'index']);
Route::get('householdgoods/{id}', [HouseholdgoodsController::class, 'show']);
Route::post('householdgoods', [HouseholdgoodsController::class, 'filter']);
Route::post('/householdgoods/ascending', [HouseholdgoodsController::class, 'filter']);
Route::post('/householdgoods/descending', [HouseholdgoodsController::class, 'filter']);
Route::get('/householdgoods/ascending', [HouseholdgoodsController::class, 'ascendingOrder'])->name('householdgoods/ascending');
Route::get('/householdgoods/descending', [HouseholdgoodsController::class, 'descendingOrder'])->name('householdgoods/descending');

Route::get('/craft', [CraftController::class, 'index']);

Route::get('/toiletries', [ToiletriesController::class, 'index']);

Route::get('/pages/form', array('as' => 'form', function () {
    return view('pages.page.form');
}));

Route::get('/pages/checkout', array('as' => 'checkout', function () {
    return view('pages.page.checkout');
}));

Route::get('/admin',  function () {
    return view('layout.adminpage');
})->middleware(['auth']);

Route::resource('checkouts', CheckoutController::class);

Route::get('/dashboard', function () {
    return view('pages.page.succesfully_logged');
})->middleware(['auth'])->name('dashboard');


Route::post('/add-to-cart', [CartController::class, 'add'])->name('add-to-cart');
Route::get('/cart', [CartController::class, 'show']);

require __DIR__.'/auth.php';
