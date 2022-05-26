<?php

use App\Http\Controllers\AffichageController;
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

Route::get("/affichage",[AffichageController::class,"toutesLesDonnees"]);
Route::get("/ajout", [AffichageController::class, "ajout"]);
Route::post("/recupAjout",[AffichageController::class,"ajoutUtilisateur"]);

