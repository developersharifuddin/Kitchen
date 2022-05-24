<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\SubitemController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeatureItemController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;

 

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::post('/contuct', [App\Http\Controllers\ContactController::class, 'contuct'])->name('contuct');
 
Route::post('/sendEmail', [App\Http\Controllers\ContactController::class, 'sendEmail'])->name('sendEmail');
 
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index' ])->name('admin.dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('about', AboutusController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubcategoryController::class);
    Route::resource('item', ItemController::class);
    Route::resource('subitem', SubitemController::class);
    Route::resource('reservation', AdminReservationController::class);
    Route::resource('feature', FeatureController::class);
    Route::resource('featureitem', FeatureItemController::class);
  
});


    Route::post('/reservation', [App\Http\Controllers\User\ReservationController::class, 'sentReservation'])->name('sentReservation');
    
 

     // Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
     

