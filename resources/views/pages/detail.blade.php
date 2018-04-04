@extends('layouts.main')
@section('content')


    <div class="outer">
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix">
                    <div class="mi-header-headline">
                        <h2>
                            {{$cocktail->title}}
                        </h2>
                    </div>
                    <div class="mi-header-buttons">
                        @if (Auth::user())
                            @if (Auth::user()->role == "admin" || $cocktail->createdByUser == Auth::user())
                                <a href="/delete_confirm/{{$cocktail->id}}">
                                    <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </a>
                            @endif

                            <div class="mi-addToRecipebook-container dropdown">
                                <button class="btn btn-success"
                                        type="button"
                                        data-toggle="dropdown"
                                        data-target="#mi-addToRecipebook-form"
                                        aria-haspopup="true"
                                        aria-expanded="true">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Zu Rezeptbuch hinzufügen
                                </button>

                                <div id="mi-addToRecipebook-form" class="collapse">
                                    <form action="/addToRecipebook">
                                        <select>
                                            @foreach(Auth::user()->recipebooks as $recipebook)
                                                <option value="$recipebook">{{$recipebook->title}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </form>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <p>{{$cocktail->description}}</p>

                <dl class="knockout-around">
                    @foreach($cocktail->ingredientcombinations as $combi)
                        <dt>{{ $combi->amount }}{{$combi->ingredient->unit}}</dt>
                        <dd>{{ $combi->ingredient->title }}</dd>
                    @endforeach
                </dl>

                <div>
                    <h3> Zubereitung </h3>
                    <p>{{$cocktail->makingdescription}}</p>
                </div>
                <br/>
                <p class="small-tag">
                    Autor: {{$cocktail->createdByUser->name}} <br/>
                    Erstellt am: {{date('d. F, Y', strtotime($cocktail->created_at))}}
                </p>
            </div>
            <div class="col-md-3">
                <div class="cocktail-img">
                    <!--insert image -->
                </div>
            </div>

        </div>
    </div>

@stop

@section('header')
    <link href="/css/detail.css" rel="stylesheet">
@stop
