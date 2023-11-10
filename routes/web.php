<?php

use App\Http\Controllers\blogController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog',[BlogController::class,'index'])->name('blog.index'); //index function in blog controller
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::put('/blog/{id}/update',[BlogController::class,'update'])->name('blog.update');
Route::get('/blog/{blog}/destroy',[BlogController::class,'destroy'])->name('blog.destroy');