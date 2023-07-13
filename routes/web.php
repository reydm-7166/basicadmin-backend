<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\LoginController;
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

Route::prefix('admin')->group(function () {

    Route::prefix('product')->group(function () {
        Route::resource('', ProductController::class, [
            'names' => 'product',
            'parameters' => ['' => 'id']
        ]);
    });

});
