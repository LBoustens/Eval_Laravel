<?php

use App\Http\Requests\RecetteRequest;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/recettes?ingredient=xxx&duree=yyy', function (Request $request){


});

route::delete('/recettes/{id}', function (Request $request){
        $recette = Recette::find($request->id); // produit where id=1
        if ($recette){
            $ok = $recette->delete();
            if ($ok) {
                return response()->json(["status" => 1, "message" => "produit supprimé"],201);
            } else {
                return response()->json(["status" => 0, "message" => "pb lors de
la suppression"],400);
            }}
        else return response()->json(["status" => 0, "message" => "ce produit n'existe pas"],404);
});

route::put('/recettes/{id}', function (RecetteRequest $request){
    $recette = Recette::find($request->id); // produit where id=$request
    if ($recette){
        $recette->titre = $request->titre;
        $recette->ingredients = $request->ingredients;
        $recette->photo = $request->photo;
        $recette->duree = $request->duree;
        $ok = $recette->save();
        if ($ok) {
            return response()->json(["status" => 1, "message" => "produit modifier"],201);
        } else {
            return response()->json(["status" => 0, "message" => "pb lors de
la modification"],400);
        }}
    else return response()->json(["status" => 0, "message" => "ce produit n'existe pas"],404);

});
