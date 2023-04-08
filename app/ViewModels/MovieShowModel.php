<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieShowModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => $this->movie['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path']
                : 'https://via.placeholder.com/500x750',
            'production_companies' => collect($this->movie['production_companies'])->pluck('name')->flatten()->take(1)->implode(''),
            'vote_average' => $this->movie['vote_average'] * 10 . '%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'country' => collect($this->movie['production_companies'])->pluck('origin_country')->flatten()->take(1)->implode(''),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'cast' => collect($this->movie['credits']['cast'])->take(5)->map(function($cast) {
                return collect($cast)->merge([
                    'profile_path' => $cast['profile_path']
                        ? 'https://image.tmdb.org/t/p/w300'.$cast['profile_path']
                        : 'https://via.placeholder.com/300x450',
                ]);
            }),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
        ])->only([
            'title', 'poster_path', 'production_companies', 'vote_average', 'release_date', 'genres', 'country', 'crew', 'cast', 'tagline', 'images', 'credits', 'videos', 'images', 'backdrop_path', 'overview'
        ]);
    }
}
