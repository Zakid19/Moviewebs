@extends('layouts.main')

@section('content')

<section class="section section--details section--bg" data-bg="img/section/details.jpg">
    <!-- details content -->
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <h1 class="section__title section__title--mb">{{ $actor['name'] }}</h1>
            </div>
            <!-- end title -->

            <!-- content -->
            <div class="col-12 col-xl-8">
                <div class="card card--details">
                    <div class="row">
                        <!-- card cover -->
                        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-5">
                            <div class="card__cover">
                                <img src="{{ $actor['profile_path'] }}" alt="">
                            </div>
                        </div>
                        <!-- end card cover -->

                        <!-- card content -->
                        <div class="col-12 col-md-9 col-lg-9 col-xl-7">
                            <div class="card__content">
                                <ul class="card__meta">
                                    <li><span>Birthday:</span>{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in {{ $actor['place_of_birth'] }}</li> <br
                                    <li><span> {{ $actor['biography'] }}</li>
                                </ul>
                                {{-- <div class="card__description">
                                {{ $tvshow['tagline'] }}
                                </div> --}}
                            </div>
                        </div>
                        <!-- end card content -->
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>
    </div>
    <!-- end details content -->
</section>

<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">Known For</h2>
                    <!-- end content title -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 col-xl-7">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                        <div class="row row--grid">
                            @foreach($knownForMovies as $movie)
                            <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                <div class="card">
                                    <div class="card__cover">
                                        <img src="{{ $movie['poster_path'] }}" alt="">
                                        <a href="{{ $movie['linkToPage'] }}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="{{ $movie['linkToPage'] }}">{{ $movie['title'] }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

             <!-- sidebar -->
             <div class="col-12 col-lg-5 col-xl-5">
                <div class="row row--grid">
                    <!-- section title -->
                    <div class="col-12">
                        <h2 class="section__title section__title--sidebar">Credits</h2>
                    </div>
                    <!-- end section title -->

                    @foreach($credits as $credit)
                                <span class="card__title">
                                    <ul class="list-disc leading-loose mt-8">
                                    <li>
                                        {{ $credit['release_year'] }} &middot;
                                        <strong><a href="{{ $credit['linkToPage'] }}" class="hover:underline">{{ $credit['title'] }}</a></strong>
                                         as {{ $credit['character'] }}
                                    </li>
                                    </ul>
                                </span>

                    @endforeach
                </div>
            </div>
            <!-- end sidebar -->
        </div>
        <!-- end content tabs -->
    </div>
</section>

@endsection
