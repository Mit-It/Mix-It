@extends('layouts.main')
@section('content')
    <div style="width: 900px; margin: 0 auto;">
        <table id="mi-list" class="table">
            <thead>
            <tr>
                <th>Name</th>

                <th>Beschreibung</th>
                @if (Auth::user())
                    @if (Auth::user()->role == "admin")
                        <th></th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($cocktails as $cocktail)
                <tr>
                    <td><a href="cocktails/{{$cocktail->id}}">{{ $cocktail->title }}</a></td>
                    <td>{{ $cocktail->description }}</td>
                    @if (Auth::user())
                        @if (Auth::user()->role == "admin"|| $cocktail->createdByUser == Auth::user())
                            <td>
                                <a href="/delete_confirm/{{$cocktail->id}}">
                                    <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </a>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if (Auth::user())
            <a href="/create"><button class="btn btn-default">neuer Cocktail</button></a>
        @endif
    </div>

@stop
@section('bodyEnd')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mi-list').DataTable({
                "language": {
                    "decimal": ",",
                    "emptyTable": "Keine Rezepte gefunden",
                    "info": "Zeige _START_ bis _END_ von _TOTAL_ Rezepten",
                    "infoEmpty": "Zeige 0 von 0 Rezepten",
                    "infoFiltered": "(gefiltert _TOTAL_ von _MAX_ total Rezepten)",
                    "infoPostFix": "",
                    "thousands": ".",
                    "lengthMenu": "Zeige _MENU_ Rezepte",
                    "loadingRecords": "Lädt...",
                    "processing": "Processing...",
                    "search": "<i class='fa fa-search' aria-hidden='true'></i>",
                    "zeroRecords": "Keine passenden Rezepte gefunden...",
                    "paginate": {
                        "first": "<i class='fa fa-step-backward' aria-hidden='true'></i>",
                        "last": "<i class='fa fa-step-forward' aria-hidden='true'></i>",
                        "next": "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
                        "previous": "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
                    }
                },
                "ordering": true,
                "pageLength": 5,
                "lengthMenu": [ 5, 10, 25],

            });
        });
    </script>
@stop

@section('header')
    <link href="/css/list.css" rel="stylesheet">
@stop