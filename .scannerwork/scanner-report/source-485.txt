@extends('layouts.main')
@section('content')
    form action="/loginme" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    USERNAME: <input type="text" name="username" ><br />
    PASSWORD: <input type="password" name="password"><br />
    <input type="submit" name="login" value="Login">

    </form><
@stop