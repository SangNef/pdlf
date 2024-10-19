<?php

use App\Http\Controllers\ItemSaleController;
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

Route::get('/', [ItemSaleController::class, 'index'])->name('item_sales.index');
Route::get('/item_sales/create', [ItemSaleController::class, 'create'])->name('item_sales.create');
Route::post('/item_sales', [ItemSaleController::class, 'store'])->name('item_sales.store');
Route::get('/item_sales/{itemSale}/edit', [ItemSaleController::class, 'edit'])->name('item_sales.edit');
Route::put('/item_sales/{itemSale}', [ItemSaleController::class, 'update'])->name('item_sales.update');
Route::delete('/item_sales/{itemSale}', [ItemSaleController::class, 'destroy'])->name('item_sales.destroy');
