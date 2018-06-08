@extends('layouts.main')
@section('content')
    <h1>Meine Rezeptbücher</h1>
    <div class="row">
        @foreach ($recipebooks as $recipebook)
            <div class="col-md-9 col-sm-12">
                <div class="mi-left-to-right mi-rp-overview-item">
                    <a href="recipebooks/{{$recipebook->id}}" class="mi-no-underline mi-rb-title">
                        <span class="mi-text-hightlight">{{$recipebook->title}}</span>
                        <a href="/delete_rb_confirm/{{$recipebook->id}}" class="mi-rb-delete">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </a>
                    </a>
                    <p>{{count($recipebook->cocktails)}} Cocktails</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mi-rb-actions">
        <a href="/newRecipebook">
            <button class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Neues Rezeptbuch erstellen
            </button>
        </a>
    </div>

@stop


@section('header')
    <link href="/css/recipebook.css" rel="stylesheet">
@stop