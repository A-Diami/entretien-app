<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Entretien

Route::get('/entretien', [App\Http\Controllers\EntretienController::class, 'index'])->name('entretien');

//Route::resource('entretien', 'EntretienController');

//Route::resource('domaine', 'DomaineController');

Route::post('/addDomaine', [App\Http\Controllers\DomaineController::class, 'store'])->name('domaine.add');

Route::post('/addEntretien', [App\Http\Controllers\EntretienController::class, 'store']);

Route::get('/voirStagiaire', [App\Http\Controllers\EntretienController::class, 'voirStagiaire'])->name('voir_stagiaire');

Route::get('/getStagiaire/{entretien}', [App\Http\Controllers\EntretienController::class, 'show'])->name('show.getStagiaire');

Route::get('/editStagiaire/{id}', [App\Http\Controllers\EntretienController::class, 'edit'])->name('edit.getStagiaire');

Route::post('/updateStagiaire', [App\Http\Controllers\EntretienController::class, 'update'])->name('updatestagiaire');

Route::post('/storeStagiaire', [App\Http\Controllers\EntretienController::class, 'store'])->name('storestagiaire');

//Route::get('/entretienByDomaine/{domaine_id}', [App\Http\Controllers\EntretienController::class, 'voirStagiaire'])->name('domaine.stagiaire');
