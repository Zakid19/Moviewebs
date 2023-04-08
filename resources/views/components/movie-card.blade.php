<div class="col-6 col-sm-4 col-md-3 col-xl-2">
    <div class="card">
        <div class="card__cover">
            <img src="{{ $movie['poster_path'] }}" alt="">
            <a href="{{ route('movies.show', $movie['id']) }}" class="card__play">
                <i class="icon ion-ios-play"></i>
            </a>
            <span class="card__rate card__rate--green">{{ $movie['vote_average'] }}</span>
        </div>
        <div class="card__content">
            <h3 class="card__title"><a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></h3>
            {{-- <p class="card__meta">{{ $movie['release_date'] }}</p> --}}
            <span class="card__category">
                <a href="#">{{ $movie['genres'] }}</a>
            </span>
        </div>
    </div>
</div>
