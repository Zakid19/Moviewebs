<div class="col-6 col-sm-4 col-md-3 col-xl-2">
    <div class="card">
        <div class="card__cover">
            <img src="{{ $tvshow['poster_path'] }}" alt="">
            <a href="{{ route('tv.show', $tvshow['id']) }}" class="card__play">
                <i class="icon ion-ios-play"></i>
            </a>
            <span class="card__rate card__rate--green">{{ $tvshow['vote_average'] }}</span>
        </div>
        <div class="card__content">
            <h3 class="card__title"><a href="{{ route('tv.show', $tvshow['id']) }}">{{ $tvshow['name'] }}</a></h3>
            <p class="card__meta">{{ $tvshow['first_air_date'] }}</p>
            <span class="card__category">
                <a href="#">{{ $tvshow['genres'] }}</a>
            </span>
        </div>
    </div>
</div>
