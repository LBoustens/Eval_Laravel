<?php

use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/liste', function (Request $request) {
    $recettes = Recette::get();
    return view('liste_recettes', ["recettes"=>$recettes]);
});

Route::get('/recherche', function (Request $request) {
    $motcles = $request->input('search');
    $recettes = Recette::where('ingredients', 'like', "%$motcles%")->get();
    return view('resultat_recherche', ["recettes"=>$recettes]);
});

Route::get('/ajouter', function (Request $request) {
    return view('ajout_recettes');
});

Route::post('/ajout', function (Request $request) {
    $recette = new Recette;
    $recette->titre = $request->titre;
    $recette->ingredients = $request->ingredients;
    $recette->duree = $request->duree;
    $recette->photo = $request->photo;
    $recette->save();
    $recettes = Recette::get();
    if ($recette) {
        $message = "La recette à été ajouté";
        return view('liste_recettes', ["recettes"=>$recettes, "message"=>$message]);
    } else {
        $message = "les données ne sont pas valides ";
        view('ajout_recettes', ["message"=>$message]);
    }

});
