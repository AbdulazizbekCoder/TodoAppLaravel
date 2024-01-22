<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;
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
Route::get('/' , [PageController::class , 'main'])->name('main');

Route::get('/{id}' , [PageController::class , 'edit'])->name('edit');

Route::post('/{id}' , [PageController::class , 'update'])->name('update');

Route::post('/' , [PageController::class , 'store'])->name('store');

Route::delete('/{id}' , [PageController::class , 'delete'])->name('delete');
