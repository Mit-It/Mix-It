
@extends('layouts.main')
@section('content')
    Do you really want to delete Cocktail {{$cocktail->title}} ?
    <br/>
    <a href="/delete/{{$cocktail->id}}"><button class="btn btn-danger">Yes, delete</button></a>
    <a href="/cocktails"><button class="btn btn-default">No, don't delete!</button></a>
@stop