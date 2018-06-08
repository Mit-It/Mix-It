
@extends('layouts.main')
@section('content')
    Willst du wirklich den Cocktail <em>{{$cocktail->title}}</em> löschen?
    <br/>
    <a href="/delete/{{$cocktail->id}}"><button class="btn btn-danger">Ja, löschen</button></a>
    <a href="/cocktails"><button class="btn btn-default">Nein, nicht löschen!</button></a>
@stop