<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
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
    return view('auth.login');
});

Route::get('/order', [MenuController::class, 'index']);


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.list');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['prefix'=>'admin', 'namespace' => 'Admin'],
    function(){

        // MENU ROUTES 
        Route::get('/menu', [MenuController::class, 'index']);
        Route::post('/menu/api/store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/menu/api', [MenuController::class, 'getAllApi'])->name('get.all.menu.api');
        Route::get('/menu/api/active_inactive/{id}/{is_active}', [MenuController::class, 'activeInactiveMenu'])->name('get.active_inactive.menu.api');
        Route::get('/menu/api/details/{menuId}', [MenuController::class, 'show'])->name('get.show.category.api');
        Route::delete('/menu/api/delete/{menuId}', [MenuController::class, 'destroy'])->name('menu.destroy.api');
        Route::post('/menu/api/update/{menuId}', [MenuController::class, 'update'])->name('menu.update');
    

        // CATEGORY SETTING 
        Route::get('/category', [CategoryController::class, 'index']);
        Route::post('/category/api/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/api', [CategoryController::class, 'getAllApi'])->name('get.all.category.api');
        Route::get('/category/api/active_inactive/{id}/{is_active}', [CategoryController::class, 'activeInactiveCategory'])->name('get.active_inactive.category.api');
        Route::get('/category/api/details/{categoryId}', [CategoryController::class, 'show'])->name('get.show.category.api');
        Route::delete('/category/api/delete/{categoryId}', [CategoryController::class, 'destroy'])->name('category.destroy.api');
        Route::post('/category/api/update/{categoryId}', [CategoryController::class, 'update'])->name('category.update');


        // USER MANAGEMENT
        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/api/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/api', [UserController::class, 'getAllApi'])->name('get.all.user.api');
        Route::get('/user/api/active_inactive/{id}/{is_active}', [UserController::class, 'activeInactiveUser'])->name('get.active_inactive.user.api');
        Route::get('/user/api/details/{userId}', [UserController::class, 'show'])->name('get.show.user.api');
        Route::delete('/user/api/delete/{userId}', [UserController::class, 'destroy'])->name('user.destroy.api');
        Route::post('/user/api/update/{userId}', [UserController::class, 'update'])->name('user.update');
        
    });

});

require __DIR__.'/auth.php';
