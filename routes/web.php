<?php

use App\Http\Controllers\CellController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/cells', [CellController::class, 'index'])->name('admin.cells.index');
Route::post('/admin/cells/store', [CellController::class, 'store'])->name('admin.cells.store');
Route::get('/admin/cells/{id}/edit', [CellController::class, 'edit'])->name('admin.cells.edit');
Route::post('/admin/cells/update', [CellController::class, 'update'])->name('admin.cells.update');
Route::post('/admin/cells/delete', [CellController::class, 'destroy'])->name('admin.cells.destroy');
Route::post('/admin/cells/sell/{data}', [CellController::class, 'sell'])->name('admin.cells.sell');


