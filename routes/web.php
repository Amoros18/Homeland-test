<?php

<<<<<<< HEAD
use App\Http\Controllers\Prop\PropertiesController;
=======
>>>>>>> e099b19 (mise en plqce de laravel/ui)
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

<<<<<<< HEAD
Route::get('/home', [PropertiesController::class, 'index'])->name('home');
Route::get('/prop-details/{id}', [PropertiesController::class, 'single'])->name('single.prop');

=======
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> e099b19 (mise en plqce de laravel/ui)
