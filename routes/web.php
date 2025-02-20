<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Prop\PropertiesController;
use App\Http\Controllers\Users\UsersController;
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

Route::group(['prefix'=>'props'], function(){

    Route::get('/prop-details/{id}', [PropertiesController::class, 'single'])->name('single.prop');


    //insert request
    Route::post('/prop-details/{id}', [PropertiesController::class, 'insertRequest'])->name('insert.request');


    // saving props
    Route::post('/prop-save/{id}', [PropertiesController::class, 'saveProps'])->name('save.prop');

    //displaying props by rent and buy
    Route::get('/type/Buy', [PropertiesController::class, 'propsBuy'])->name('buy.prop');
    Route::get('/type/Rent', [PropertiesController::class, 'propsRent'])->name('rent.prop');


    //displaying props by home type
    Route::get('/home-type/{hometype}', [PropertiesController::class, 'displaysByHomeType'])->name('display.prop.hometype');


    //displaying props by price asc or desc
    Route::get('/price-asc', [PropertiesController::class, 'priceAsc'])->name('price.asc.prop');
    Route::get('/price-desc', [PropertiesController::class, 'priceDesc'])->name('price.desc.prop');

    //searching for props
    Route::post('/search', [PropertiesController::class, 'searchProps'])->name('search.props');

});
//users pages

Route::group(['prefix'=>'users'],function(){
    Route::get('/all-requests', [UsersController::class, 'allRequests'])->name('all.request');
    Route::get('/all-saved-props', [UsersController::class, 'allSavedProps'])->name('all.saved.props');
});

//display contact and about page
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about', [HomeController::class, 'about'])->name('about');


Route::get('admin/login', [AdminController::class, 'viewLogin'])->name('view.login');
