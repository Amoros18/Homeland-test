<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Prop\PropertiesController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PropertiesController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [PropertiesController::class, 'index'])->name('home');
Route::get('/prop-details/{id}', [PropertiesController::class, 'single'])->name('single.prop');


//insert request
Route::post('/prop-details/{id}', [PropertiesController::class, 'insertRequest'])->name('insert.request');


// saving props
Route::post('/prop-save/{id}', [PropertiesController::class, 'saveProps'])->name('save.prop');

//displaying props by rent and buy
Route::get('/props/type/Buy', [PropertiesController::class, 'propsBuy'])->name('buy.prop');
Route::get('/props/type/Rent', [PropertiesController::class, 'propsRent'])->name('rent.prop');


//displaying props by home type
Route::get('/props/home-type/{hometype}', [PropertiesController::class, 'displaysByHomeType'])->name('display.prop.hometype');


//displaying props by price asc or desc
Route::get('/props/price-asc', [PropertiesController::class, 'priceAsc'])->name('price.asc.prop');
Route::get('/props/price-desc', [PropertiesController::class, 'priceDesc'])->name('price.desc.prop');


//display contact and about page
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about', [HomeController::class, 'about'])->name('about');
