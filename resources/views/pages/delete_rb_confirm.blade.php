
@extends('layouts.main')
@section('content')
    Willst du das Rezeptbuch <em>{{$recipebook->title}}</em> wirklich löschen?
    <br/>
    <a href="/delete_rb/{{$recipebook->id}}"><button class="btn btn-danger">Ja, löschen </button></a>
    <a href="/recipebooks"><button class="btn btn-default">Nein, nicht löschen!</button></a>
@stop