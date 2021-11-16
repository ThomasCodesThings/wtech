<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HouseholdgoodsController;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\ToiletriesController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
