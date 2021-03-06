@php
    $locale = app()->getLocale();
@endphp
@extends('layouts.catering_app')
@section('title')
    Search result
@endsection
@section('body')
    <!-- BANNER TWO PART START -->
    <section class="banner-three">
        <div class="overlay">
            <div class="container py-5">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 m-auto text-center py-lg-5">
                        <form method="GET" action="{{ route('search.result') }}">
                            @csrf
                            <div class="input-group search-bar">
                                <input type="text" class="custom-search form-control" placeholder="Restaurant name or address here..." aria-label="Find restaurants for foods" aria-describedby="button-addon2" value="{{ request('address') }}" name="address">
                                <button class="btn btn-outline-secondary ps-sm-2 ps-lg-4 pe-sm-2 pe-lg-4" type="submit" id="button-addon2"> @lang('home.search') </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER TWO PART END -->

    <!-- SEARCH LOCATION START -->
    {{-- <section class="search-location my-5">
        <div class="container">
            <div class="location">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463876.93971471715!2d46.54234411876101!3d24.725555344345064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%20Saudi%20Arabia!5e0!3m2!1sen!2sbd!4v1638432509258!5m2!1sen!2sbd"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- SEARCH LOCATION END -->

    <!-- SEARCH RESULT PART START -->
    <section class="search-result my-5">
        <div class="container">
            <div class="row">
                <h4 class="mb-5">Search Results For '{{ $search_query }}'</h4>
                @forelse ($search_results as $restaurant)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="image">
                            <a href="{{ route('restaurant.foods', $restaurant->id) }}">
                                <img width="100%" src="{{ asset('assets/img/restaurant/') }}/{{ $restaurant->res_image }}" alt="restorent-img">
                                @if ($restaurant->res_discount)
                                    <p>{{ $restaurant->res_discount }}% OFF</p>
                                @endif
                            </a>
                        </div>
                        <div class="review d-flex pt-4">
                            <a href="{{ route('restaurant.foods', $restaurant->id) }}">
                                <p>{{ $restaurant->res_name }}</p>
                            </a>
                            <span class="ps-4"><i class="fas fa-star"></i> 0.0/5 (00) </span>
                        </div>
                        <i class="fas fa-map-marker-alt"></i><span class="away ps-2">{{ $restaurant->country }}, {{ $restaurant->city }}, {{ Str::limit($restaurant->address, 8, $end='..') }}</span>
                    </div>
                    @empty
                    <p class="text-danger">Nothig to show any restaurants for this query...</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- SEARCH RESULT PART START -->

    <!-- SPECIAL CATERING START  -->
    <section class="special-catering">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-start mb-sm-3 mb-lg-5 best-items">
                    <h4>@lang('home.our_best_items') </h4><hr class="best-item">
                </div>
            </div>
            <div class="row best-foods">
                @foreach ($bestfoods as $bestfood)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 text-center mb-sm-3 mb-lg-5 best-foods-item">
                        <div class="catering-item">
                            <div class="offer text-center">
                                <img class="mx-auto d-block" src="{{ asset("assets/img/food") }}/{{ $bestfood->image }}" alt="food-img">
                                <div class="discount">
                                    <h4>25% Off</h4>
                                </div>
                            </div>
                            <h4>{{ $bestfood->title }}</h4>
                            <p class="paragraph pt-2 ps-2 pe-2">{{ $bestfood->short_description }}</p>
                            <h4 class="price">{{ $bestfood->price }} @lang('home.currency')</h4>
                            <div class="add-cart mt-3 mb-5">
                                <button class="custom-btn product_id" data-id={{ $bestfood->id }} href="#">@lang('home.add_to_cart')</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @empty($bestfood)
                    <span class="text-danger">Nothin to show Foods...</span>
                @endempty
            </div>
        </div>
    </section>
    <!-- SPECIAL CATERING END  -->

    <!-- DESCOUNT BANNER STAR -->
    @include('catering_components.discount_banner');
    <!-- DESCOUNT BANNER END -->

    <!-- LATEST BLOG START -->
    @include('catering_components.latest_blog')
    <!-- LATEST BLOG END -->
@endsection
@section('footer_script')
    <script>
        $('.best-foods').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($locale == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            arrows: false,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    </script>
@endsection