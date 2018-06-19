@extends('layouts.main')
@section('content')
    <h1>Zu Rezeptbuch hinzufügen</h1>
    <label for="mi-recipebook-addCocktail">Bitte wähle ein Rezeptbuch aus</label>
    <select class="form-control" id="mi-recipebook-addCocktail">
        <option>1</option>

    @foreach ($recipebooks as $recipebook)
        <h2><a href="recipebooks/{{$recipebook->id}}" >{{$recipebook->title}}</a></h2>
        <p>{{count($recipebook->cocktails)}} Cocktails</p>
        <br />
    @endforeach
    </select>

    <a href="/newRecipebook">
        <button class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Neues Rezeptbuch erstellen
        </button>
    </a>
@stop