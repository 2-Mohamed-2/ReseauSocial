<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\InconnuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;

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
    return view('layouts.index'); 
})->name('index');

// Pour l'authentification

//Route::get('/Accueil', LoginController::class);

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
