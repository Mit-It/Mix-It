@extends('layouts.main')
@section('content')
    <h1>{{$recipebook->title}}</h1>
    <div class="col-md-9 col-sm-12 mi-rp-cocktails">
        <dl class="dl-horizontal">
            @foreach ($recipebook->cocktails as $cocktail)

                <dt>
                    <a href="../cocktails/{{$cocktail->id}}" class="mi-primaryColor">{{$cocktail->title}}</a>
                </dt>
                <dd>
                    {{$cocktail->description}}

                </dd>

            @endforeach
        </dl>
    </div>

@stop

@section('header')
    <link href="/css/recipebook.css" rel="stylesheet">
@stop
