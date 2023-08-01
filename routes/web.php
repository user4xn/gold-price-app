<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [TransactionController::class, 'add'])->name('guest');
// Route::get('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
Route::get('/', [TransactionController::class, 'customOrder'])->name('custom-order');
Route::get('/order-completed', [TransactionController::class, 'orderCompleted'])->name('order-completed');
Route::post('transaction/store', [TransactionController::class, 'store'])->name('transaction-store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/gold-price', [AuthController::class, 'checkGold'])->name('gold-price');
Route::get('/not-authorized', [AuthController::class, 'notAuthorized'])->name('not-authorized');
Route::post('/custom-login', [AuthController::class, 'customLogin'])->name('custom-login');

Auth::routes();

Route::middleware(['single.session'])->group(function() {
    Route::post('/custom-logout', [AuthController::class, 'logOut'])->name('custom-logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('product')->middleware(['auth'])->group(function () { 
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/datatable', [ProductController::class, 'datatable'])->name('product-datatable');
        Route::get('/add', [ProductController::class, 'add'])->name('product-add');
        Route::post('/store', [ProductController::class, 'store'])->name('product-store');
        Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product-detail');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product-update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product-destroy');
    });

    Route::prefix('transaction')->middleware(['auth'])->group(function () { 
        Route::get('/', [TransactionController::class, 'index'])->name('transaction');
        Route::get('/datatable', [TransactionController::class, 'datatable'])->name('transaction-datatable');
        Route::get('/detail/{id}', [TransactionController::class, 'detail'])->name('transaction-detail');
    });
    
    Route::prefix('user')->middleware(['auth'])->group(function () { 
        Route::get('/', [UserController::class, 'allUsers'])->name('users');
        Route::get('/datatable', [UserController::class, 'getData'])->name('get-users');
        Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail-user');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update-user');
        Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete-user');
        Route::get('/add', [UserController::class, 'addUser'])->name('add-user');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
        Route::post('/store', [UserController::class, 'storeUser'])->name('store-user');
    });
});
