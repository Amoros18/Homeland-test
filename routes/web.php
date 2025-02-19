<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [PropertiesController::class, 'index'])->name('home');
Route::get('/prop-details/{id}', [PropertiesController::class, 'single'])->name('single.prop');


//insert request
Route::post('/prop-details/{id}', [PropertiesController::class, 'insertRequest'])->name('insert_request');
