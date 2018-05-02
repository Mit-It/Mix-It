@extends('layouts.main')
@section('content')

    <div class="mi-create-recipebook">
        <form action="/createRecipebook" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <label for="rb-title" class="col-md-1 control-label">Titel:</label>
            <div class="col-md-11">
                <input class="form-control" id="rb-title" type="text" name="title" ><br />
            </div>
            <br/>

            <button class="btn btn-success" type="submit" name="new">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Hinzufügen
            </button>

        </form>

    </div>
@stop
