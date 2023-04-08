@extends('layouts.main')

@section('content')

<section class="section section--details section--bg" data-bg="img/section/details.jpg">
    <!-- details content -->
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <h1 class="section__title section__title--mb">{{ $movie['title'] }}</h1>
            </div>
            <!-- end title -->

            <!-- content -->
            <div class="col-12 col-xl-6">
                <div class="card card--details">
                    <div class="row">
                        <!-- card cover -->
                        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-5">
                            <div class="card__cover">
                                <img src="{{ $movie['poster_path'] }}" alt="">
                                <span class="card__rate card__rate--green">8.4</span>
                            </div>
                            <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="card__trailer"><i class="icon ion-ios-play-circle"></i> Watch trailer</a>
                        </div>
                        <!-- end card cover -->

                        <!-- card content -->
                        <div class="col-12 col-md-8 col-lg-9 col-xl-7">
                            <div class="card__content">
                                <ul class="card__meta">
                                    <li><span>Production:</span> {{ $movie['production_companies'] }}</li>
                                    <li><span>Genre:</span>{{ $movie['genres'] }}</li>
                                    <li><span>Release date:</span> {{ $movie['release_date'] }}</li>
                                    <li><span>Running time:</span> 130 min</li>
                                    <li><span>Country:</span>{{ $movie['country'] }}</li>
                                    <li><span>Crew:</span>
                                        @foreach($movie['crew'] as $crew)
                                        <a href="#">{{ $crew['name'] }}</a></li>
                                        @endforeach
                                </ul>
                                <div class="card__description">
                                {{ $movie['tagline'] }}
                                </div>
                            </div>
                        </div>
                        <!-- end card content -->
                    </div>
                </div>
            </div>
            <!-- end content -->

            <!-- player -->
            <div class="col-12 col-xl-6">
                <h2 class="content__title">Overview</h2>
                <p class="card__meta">{{ $movie['overview'] }}</p>
            </div>
            <!-- end player -->
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
                    <h2 class="content__title">Discover</h2>
                    <!-- end content title -->

                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Cast</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a>
                        </li>
                    </ul>
                    <!-- end content tabs nav -->

                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="Comments">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Cast</a></li>

                                <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8">
                <!-- content tabs -->
                <div class="tab-content">
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                        <div class="gallery" itemscope>
                            <div class="row row--grid">
                                <!-- gallery item -->
                                @foreach($movie['cast'] as $cast)
                                <figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
                                    <a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
                                        <img src="{{ $cast['profile_path'] }}" itemprop="thumbnail" alt="Image description" />
                                    </a>
                                    <h3 class="card__title"><a href="">{{ $cast['name'] }}</a></h3>
                                    <p class="card__meta">{{ $cast['character'] }}</p>
                                    <figcaption itemprop="caption description">Some image caption 1</figcaption>
                                </figure>
                                @endforeach
                                <!-- end gallery item -->
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                        <!-- project gallery -->
                        <div class="gallery" itemscope>
                            <div class="row row--grid">
                                <!-- gallery item -->
                                @foreach($movie['images'] as $image)
                                <figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
                                    <a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
                                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" itemprop="thumbnail" alt="Image description" />
                                    </a>
                                    <figcaption itemprop="caption description">Some image caption 1</figcaption>
                                </figure>
                                @endforeach
                                <!-- end gallery item -->
                            </div>
                        </div>
                        <!-- end project gallery -->
                    </div>
                </div>
                <!-- end content tabs -->
            </div>

            <!-- sidebar -->
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="row row--grid">
                    <!-- section title -->
                    <div class="col-12">
                        <h2 class="section__title section__title--sidebar">Watch Trailer</h2>
                    </div>
                    <!-- end section title -->

                    <!-- card -->
                    <div class="col-6 col-sm-4 col-lg-6">
                        <div class="card">
                            @if (count($movie['videos']['results']) > 0)
                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end sidebar -->
        </div>
    </div>
</section>

@endsection
