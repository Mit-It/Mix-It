@extends('layouts.main')
@section('content')
    <h1>Meine Rezeptbücher</h1>
    @foreach ($recipebooks as $recipebook)
        <div class="mi-left-to-right mi-rp-overview-item">
            <a href="recipebooks/{{$recipebook->id}}" class="mi-no-underline">
                <span class="mi-text-hightlight">{{$recipebook->title}}</span>
            </a>
            <p>{{count($recipebook->cocktails)}} Cocktails</p>
        </div>
    @endforeach

    <a href="/newRecipebook">
        <button class="btn btn-success">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Neues Rezeptbuch erstellen
        </button>
    </a>
@stop