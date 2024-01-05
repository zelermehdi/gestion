<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InscriptionController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/inscription-confirmee', [InscriptionController::class, 'create'])->name('inscription.confirmee');


Route::middleware(['auth', 'verified'])->group(function () {
    // Route pour l'administrateur
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard-admin', function () {
            return view('Admin-dashboard');
        })->name('admin.dashboard'); 
        Route::get('/Utilisateurs', [UserController::class, 'index'])->name('Utilisateurs');
 // Route pour afficher le formulaire de création d'un nouvel utilisateur

// Route pour enregistrer un nouvel utilisateur depuis le formulaire de création

// Route pour afficher les détails d'un utilisateur
Route::get('/utilisateurs/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/utilisateurs/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route pour mettre à jour un utilisateur depuis le formulaire d'édition

// Route pour supprimer un utilisateur
Route::delete('/utilisateurs/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    });

    // Route pour l'utilisateur
    Route::middleware(['role:user'])->group(function () {
        Route::get('/dashboard-user', function () {
            return view('user-dashboard');
        })->name('user.dashboard'); 
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


require __DIR__.'/all_generate_routes.php';

Route::get('/test-email', function () {
    Mail::raw('Test email', function ($message) {
        $message->to('your-email@example.com')->subject('Test Subject');
    });

    return 'Email sent successfully!';
});
// routes/web.php


use App\Http\Controllers\AccessCardController;

Route::post('/save-card/{uid}', [AccessCardController::class, 'storeCard']);
