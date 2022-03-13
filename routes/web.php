<?php

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\LoadCatalogController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/load-catalog', [LoadCatalogController::class, 'store'])->name('main.load.catalog');
