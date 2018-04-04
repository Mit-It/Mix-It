
@extends('layouts.main')
@section('content')

    <div class="create-form">
        <form action="/new_cocktail" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <label for="c-title" class="col-md-1 control-label">Titel:</label>
            <div class="col-md-11">
                <input class="form-control" id="c-title" type="text" name="title" ><br />
            </div>
            <br/>


            <div class="form-group">
                <label for="c-description">Kurzbeschreibung:</label>
                <textarea class="form-control" id="c-description"  rows="5" name="description"></textarea><br />
            </div>
            <br/>
            <label>Zutaten:</label><br/>

            <table>
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                </tr>
                </thead>
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td>
                            <div class="form-group">
                                <input class="form-control" id ="i-title-{{$i}}" type="text" name="ing-title-{{$i}}">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input class="form-control" id ="i-amount-{{$i}}" type="number" name="ing-amount-{{$i}}">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select class="form-control" id="i-unit-{{$i}}" name="ing-unit-{{$i}}">
                                    <option value="ml">ml</option>
                                    <option value="Stück">Stück</option>
                                    <option value="EL">Esslöffel</option>
                                    <option value="TL">Teelöffel</option>
                                    <option value="g">Gramm</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                @endfor
            </table>


            <div class="form-group">
                <label for="c-makingdescription">Zubereitung:</label>
                <textarea class="form-control" id="c-makingdescription" name="makingDescription" rows="5"></textarea>
            </div>
            <br/>
            <button type="submit" name="new">Hinzufügen</button>

        </form>

    </div>
@stop