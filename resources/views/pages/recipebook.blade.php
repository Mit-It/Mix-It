@extends('layouts.main')
@section('content')
    <h1>{{$recipebook->title}}</h1>
    <div class="row">
        <div class="col-md-9 col-sm-12 mi-rb-cocktails">
            <dl class="dl-horizontal">
                @foreach ($recipebook->cocktails as $cocktail)

                    <dt>
                        <a href="../cocktails/{{$cocktail->id}}" class="mi-primaryColor">{{$cocktail->title}}</a>
                    </dt>
                    <dd>
                        {{$cocktail->description}}
                        <form action="/recipebooks/delete_cocktail" method="post" class="mi-rb-deletecocktail">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{$cocktail->id}}" name="cocktail"/>
                            <input type="hidden" value="{{$recipebook->id}}" name="recipebook"/>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </dd>

                @endforeach
            </dl>
        </div>
    </div>
@stop

@section('header')
    <link href="/css/recipebook.css" rel="stylesheet">
@stop
