<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPaymentsContorller;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'authenticate'])->name('login.confirm');

Route::group(['middleware', 'auth'], function(){
    Route::get('dashboard', function () {
        return view('welcome');
    });

    Route::get('logout', [LoginController::class, 'logout']);

    Route::get('groups', [UserGroupsController::class, 'index']);
    Route::get('groups/create', [UserGroupsController::class, 'create']);
    Route::post('groups', [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);

    Route::resource('users', UserController::class);
    

    Route::get('users/sales/{id}', [UserSalesController::class, 'index'])->name('user.sales');
    // Route::delete('users/sales/{id}', [UserSalesController::class, 'index'])->name('user.sales.destroy');
    Route::post('users/invoices/{id}', [UserSalesController::class, 'createInvoice'])->name('user.sales.store');
    
    Route::get('users/invoices/user_id/{user_id}/invoice_id/{invoice_id}', [UserSalesController::class, 'invoice'])->name('user.sales.invoice_details');
    Route::delete('users/invoices/user_id/{user_id}/invoice_id/{invoice_id}', [UserSalesController::class, 'destroy'])->name('user.sales.destroy');


    Route::post('users/user_id/{id}/invoices/{invoice_id}', [UserSalesController::class, 'addItem'])->name('user.sales.invoices.add_item');

    Route::delete('users/invoices/{id}/{invoice_id}/{item_id}', [UserSalesController::class, 'destroyItem'])->name('user.sales.invoices.delete_item');



    Route::get('users/purchases/{id}', [UserPurchasesController::class, 'index'])->name('user.purchases');



    Route::get('users/payments/{id}', [UserPaymentsContorller::class, 'index'])->name('user.payments');
    Route::post('users/payments/{id}', [UserPaymentsContorller::class, 'store'])->name('user.payments.store');
    Route::delete('users/payments/{id}/{payment_id}', [UserPaymentsContorller::class, 'destroy'])->name('user.payments.destroy');


    Route::get('users/receipts/{id}', [UserReceiptsController::class, 'index'])->name('user.receipts');
    Route::post('users/receipts/{id}/{invoice_id?}', [UserReceiptsController::class, 'store'])->name('user.receipts.store');
    Route::delete('users/receipts/{id}/{receipt_id}', [UserReceiptsController::class, 'destroy'])->name('user.receipts.destroy');






    Route::resource('categories', CategoriesController::class, ['except' => ['show']]);

    Route::resource('products', ProductsController::class);

});