@extends('layouts.main')
@section('content')
    <div class="fs-container">
        <div class="flexslider" style="height: 200px;">
            <ul class="slides">
                <li>
                    <div class="fs-img" style="background-image: url('/img/cocktails1.jpg');"></div>
                </li>
                </li>
                <li>
                    <div class="fs-img" style="background-image: url('/img/cocktails5.JPG');"></div>

                </li>
                <li>
                    <div class="fs-img" style="background-image: url('/img/cocktails6.jpg');"></div>

                </li>
                <li>
                    <div class="fs-img" style="background-image: url('/img/cocktails7.JPG');"></div>
                </li>
                <li>
                    <div class="fs-img" style="background-image: url('/img/cocktails8.JPG');"></div>
                </li>
                <li>
                    <div class="fs-img" style="background-image: url('/img/cocktails9.JPG');"></div>

                </li>
            </ul>
        </div>
    </div>
    <h1>Mix-It!</h1>
    <p>Mix-It! ist ein Projekt von zwei Studenten im Rahmen des Kurses Softwareengeneering.
    Im Laufe des Projektes soll eine coole Website entstehen, die sich rund um Cocktailrezepte dreht. <br/>
    Später soll noch, in Zusammenarbeit mit den Maschinenbaustudenten, ein Roboter entstehen, der bei Klick auf einen
    Button "Mit-It!" bei einer Reihe von Cocktails, den gewünschten Cocktail automatisch mixt!</p>

    <h3>Bisher: </h3>
    <p>Hier könnt ihr die Repezte eurer liebsten Cocktailrezepte posten oder nachschauen!<br/>
    Um Cocktails hinzufügen zu können müsst ihr euch zuerst anmelden oder registrieren!
        Gelöscht werden können nur eigene Rezepte</p>

    <h3>Ausblick:</h3>
    <p>Demnächst wird noch ein persönlicher Bereich folgen, in dem ihr eure Lieblingscocktails
        dann auch in eurem persönlichen Rezeptbuch speichern könnt. </p>
@stop
@section('bodyEnd')
    <script type="text/javascript" src="/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: true,
                itemMargin: 0,
                minItems: 1
            });
        });
    </script>
@stop