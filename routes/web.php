<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/coches')->group(function(){
    Route::get('/index', [App\Http\Controllers\CochesController::class, 'index'])->name('coches-index')->middleware('auth');
    Route::post('/store', [App\Http\Controllers\CochesController::class, 'store'])->name('coches-store');
    Route::get('/create', [App\Http\Controllers\CochesController::class, 'create'])->name('coches-create');
    Route::get('/show/{id}', [App\Http\Controllers\CochesController::class, 'show'])->name('coches-show');
    Route::get('/edit/{id}', [App\Http\Controllers\CochesController::class, 'edit'])->name('coches-edit');
    Route::put('/update/{id}', [App\Http\Controllers\CochesController::class, 'update'])->name('coches-update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\CochesController::class, 'destroy'])->name('coches-destroy');
});

Route::get('/motos/index', function () {
    return view('Motos/index');
});

Route::prefix('/files')->middleware('auth')->group(function(){
    Route::get('/index', [App\Http\Controllers\FileController::class, 'index'])->name('files-index');
    Route::post('/store', [App\Http\Controllers\FileController::class, 'store'])->name('files-store');
    Route::get('/create', [App\Http\Controllers\FileController::class, 'create'])->name('files-create');
    Route::get('/show/{id}', [App\Http\Controllers\FileController::class, 'show'])->name('files-show');
    Route::get('/edit/{id}', [App\Http\Controllers\FileController::class, 'edit'])->name('files-edit');
    Route::put('/update/{id}', [App\Http\Controllers\FileController::class, 'update'])->name('files-update');
    Route::delete('/destroy/{id}', [App\Http\Controllers\FileController::class, 'destroy'])->name('files-destroy');
});