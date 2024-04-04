@extends('index')
@section('section')
    <h1>Liste des recettes</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Ingrédients</th>
            <th scope="col">Durée de préparation</th>
            <th scope="col">Photo</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($recettes as $recette)
            <td>
                {{$recette->titre}}
            </td>
            <td>
                {{$recette->ingredients}}
            </td>
            <td>
                {{$recette->duree}}
            </td>
            <td>
                <img src="{{$recette->photo}}">
            </td>
        </tbody>
        @endforeach
    </table>
@stop
