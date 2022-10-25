<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectController;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\InconnuController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    return view('layouts.index'); 
})->middleware(['auth'])->name('index');

Route::middleware(['auth'])->group(function() {
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

     //Routes pour le crud des cartes
     Route::get('/CarteFetch', [CarteController::class, 'fetchcarte']);
     Route::resource('/Carte', CarteController::class);
});




require __DIR__.'/auth.php';