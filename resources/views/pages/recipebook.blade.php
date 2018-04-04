@extends('layouts.main')
@section('content')
    <h1>{{$recipebook->title}}</h1>
    @foreach ($cocktails as $cocktail)
        <dl class="dl-horizontal">
            <dt class="">
                <a href="cocktails/{{$cocktail->id}}" class="mi-primaryColor">{{$cocktail->title}}</a>
            </dt>
            <dd>{{$cocktail->description}}</dd>
        </dl>
    @endforeach
@stop