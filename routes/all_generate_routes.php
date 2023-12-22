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

Route::resource('locataires', LocataireController::class);//->middleware(['auth', 'verified'])

Route::get('locataires/create', [LocataireController::class, 'create'])->name('locataires.create');
