@extends('layouts.main')
@section('content')

    <link
    <div class="outer">
        <!--
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
                <li>
                    <img src="http://via.placeholder.com/150x150">
                </li>
            </ul>
        </div>
        -->
        <h2>{{$cocktail->title}}</h2>
        <p>{{$cocktail->description}}</p>

        <!--
        <h3>Zutaten</h3>
        <dl class="knockout-around">
            <dt>24cl</dt>
            <dd>Cachaca</dd>

            <dt>8TL</dt>
            <dd>brauner Zucker</dd>

            <dt>2</dt>
            <dd>Limetten</dd>

            <dt>etwas</dt>
            <dd>Crusheis</dd>
        </dl>
-->
        <div>
            <h3> Zubereitung </h3>
            <p>{{//$cocktail->makingDescription}}</p>
        </div>
    </div>

    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Plugins/flexslider/woocommerce-FlexSlider-0d95828/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 150,
                itemMargin: 5,
                maxItems: 4
            });
        });
    </script>

@stop