@extends('layouts.app')

@section('content')
    <div id="cart">
    <div class="container align1">
        <div class="slider">
            <div class="photos">
                <img src="/images/food_icon01.jpg">
                <img src="/images/food_icon02.jpg">
                <img src="/images/food_icon03.jpg">
                <img src="/images/food_icon04.jpg">
                <img src="/images/food_icon05.jpg">
                <img src="/images/food_icon06.jpg">
                <img src="/images/food_icon07.jpg">
                <img src="/images/food_icon08.jpg">
            </div>
        </div>
    </div>
    </div>


    <script src="{{ asset('js/slick.min.js') }}"></script>

    <script>
        // Slick Slider Options
        jQuery(document).ready(function ($) {
            $('.photos').slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                    {
                        breakpoint: 400,
                        settings: {
                            arrows: true,
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }]
            });
        });
    </script>
@endsection
