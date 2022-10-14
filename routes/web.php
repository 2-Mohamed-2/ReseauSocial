<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/Accueil', function () {
    return view('layouts.index'); 
})->name('index');

// Routes pour le crud du commissariat  
Route::resource('/Commissariat', ComController::class);

// Routes pour le crud des Membres
Route::resource('/Membre', MembreController::class);

// Routes pour le crud des sections
Route::resource('/Section', SectController::class);

//Routes pour le crud des grades
Route::resource('/Grade', GradeController::class);

//Routes pour le crud des Roles
Route::resource('/Role', RoleController::class);

//Routes pour le crud !!!
Route::resource('/Inconnu', InconnuController::class);
