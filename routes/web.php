<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\ShowProductController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/attempt', [LoginController::class, 'authenticate'])->name('login.attempt');


Route::get('/product', [ShowProductController::class , 'index'])->name('product.index');


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/product', ProductController::class, [
        'names' => 'product',
        'parameters' => ['' => 'id']
    ]);

    // I override the patch/put method in the resource to allow method spoofing ( _method:patch ) from the vue form. :D
    Route::post('product/{id}', [ProductController::class, 'update'])->name('product.update');

});
