<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
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


Route::group(['prefix'=>'admin', 'namespace' => 'Admin'],
function(){
    Route::get('/', function (){
        return view('admin.dashboard.list');
    });


    
     // MENU ROUTES 
     Route::get('/menu', [CategoryController::class, 'index']);
     Route::post('/category/api/store', [CategoryController::class, 'store'])->name('category.store');
     Route::get('/category/api', [CategoryController::class, 'getAllApi'])->name('get.all.category.api');
     Route::get('/category/api/active_inactive/{id}/{is_active}', [CategoryController::class, 'activeInactiveCategory'])->name('get.active_inactive.category.api');
     Route::get('/category/api/details/{categoryId}', [CategoryController::class, 'show'])->name('get.show.category.api');
     Route::delete('/category/api/delete/{categoryId}', [CategoryController::class, 'destroy'])->name('category.destroy.api');
     Route::post('/category/api/update/{categoryId}', [CategoryController::class, 'update'])->name('category.update');
 

    // CATEGORY SETTING 
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category/api/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/api', [CategoryController::class, 'getAllApi'])->name('get.all.category.api');
    Route::get('/category/api/active_inactive/{id}/{is_active}', [CategoryController::class, 'activeInactiveCategory'])->name('get.active_inactive.category.api');
    Route::get('/category/api/details/{categoryId}', [CategoryController::class, 'show'])->name('get.show.category.api');
    Route::delete('/category/api/delete/{categoryId}', [CategoryController::class, 'destroy'])->name('category.destroy.api');
    Route::post('/category/api/update/{categoryId}', [CategoryController::class, 'update'])->name('category.update');

   
});