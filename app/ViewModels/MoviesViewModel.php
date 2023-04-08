<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlaying;
    public $genres;

    public function __construct($popularMovies, $nowPlaying, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlaying = $nowPlaying;
        $this->genres = $genres;
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function formatMovie($movies)
    {
        // Memanggil genre kedalam data movie['genre_ids]
        return collect($movies)->map(function($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($genre) {
                return [$genre => $this->genres()->get($genre)];
            })->implode(', ');

            // Menggabungkan data movie
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                // 'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'id', 'title', 'poster_path', 'vote_average', 'release_date', 'genre_ids', 'genres'
            ]);
        });
    }

    public function popularMovies()
    {
       return $this->formatMovie($this->popularMovies);
    }

    public function nowPlaying()
    {
       return $this->formatMovie($this->nowPlaying);
    }
}
