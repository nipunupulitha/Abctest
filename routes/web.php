<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::prefix('/category')->group(function(){
    Route::get('/', [CategoryController::class, "index"])->name('category');
    Route::post('/store', [CategoryController::class, "store"])->name('category.store');
    Route::get('/edit', [CategoryController::class, "edit"])->name('category.edit');
    Route::put('/{category_id}/update', [CategoryController::class, "update"])->name('category.update');
    Route::get('/{category_id}/delete', [CategoryController::class, "delete"])->name('category.delete');
    Route::get('/{category_id}/product', [ProductController::class, "product"])->name('category.product');
});

Route::prefix('/product')->group(function(){
    Route::post('/store', [ProductController::class, "store"])->name('product.store');
    Route::get('/{product_id}/delete', [ProductController::class, "delete"])->name('product.delete');
});

    Route::resource('products', ProductController::class);
    Route::get('pro/view', [ProductController::class, "all"])->name('pro.view');
    Route::get('producta/add', [ProductController::class, "sub"])->name('producta.add');
    Route::post('producta/store', [ProductController::class, "addProduct"])->name('producta.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/dashboard', 'ParentController@index')->middleware('auth');
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');