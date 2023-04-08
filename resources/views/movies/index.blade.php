@extends('layouts.main')

@section('content')
<!-- page title -->
<section class="section section--first section--bg" data-bg="/assets/img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h1 class="section__title">Movies</h1>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Movies</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">Popular Movies</h2>
                    <!-- end content title -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row row--grid">
                    <!-- card -->
                    @foreach($popularMovies as $movie)
                    <x-movie-card :movie="$movie" />
                    @endforeach
                    <!-- end card -->
                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</section>

<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">Now Playing</h2>
                    <!-- end content title -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row row--grid">
                    <!-- card -->
                    @foreach($nowPlaying as $movie)
                    <x-movie-card :movie="$movie" />
                    @endforeach
                    <!-- end card -->
                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</section>


@endsection
