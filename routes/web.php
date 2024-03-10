<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\PurchaseController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About';
});

Route::resource('/beverage', BeverageController::class);

Route::post('/beverage/buy', [PurchaseController::class, 'buy']);
