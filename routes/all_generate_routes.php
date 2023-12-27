<?php

namespace App\Http\Controllers;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('locataires', LocataireController::class)->only(['index']);
    Route::resource('locataires', LocataireController::class)->only(['store']);


});


Route::get('locataires/create', [LocataireController::class, 'create'])->name('locataires.create');




Route::resource('locations', LocationController::class);//->middleware(['auth', 'verified'])



Route::resource('propertys', propertyController::class);//->middleware(['auth', 'verified'])
Route::resource('bailtypes', BailTypeController::class);//->middleware(['auth', 'verified'])
Route::patch('/propertys/{property}', [PropertyController::class, 'update'])->name('propertys.update');
