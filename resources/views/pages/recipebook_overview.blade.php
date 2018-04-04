@extends('layouts.main')
@section('content')
    <h1>Meine Rezeptbücher</h1>
    @foreach ($recipebooks as $recipebook)
        <h2><a href="recipebooks/{{$recipebook->id}}" >{{$recipebook->title}}</a></h2>
        <p>{{count($recipebook->cocktails)}} Cocktails</p>
        <br />
    @endforeach

    <a href="/newRecipebook">
        <button class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Neues Rezeptbuch erstellen
        </button>
    </a>
@stop