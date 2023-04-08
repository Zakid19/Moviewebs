<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorShowModel extends ViewModel
{
    public $actor;
    public $credits;
    public $social;

    public function __construct($actor, $credits, $social)
    {
        $this->actor = $actor;
        $this->credits = $credits;
        $this->social = $social;
    }

    public function actor()
    {
       return collect($this->actor)->merge([
        'profile_path' => $this->actor['profile_path']
            ? 'https://image.tmdb.org/t/p/w500/'.$this->actor['profile_path']
            : 'https://via.placeholder.com/300x450',
        'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
        'age' => Carbon::parse($this->actor['birthday'])->age,
       ])->only([
        'id', 'name', 'profile_path', 'birthday', 'age', 'place_of_birth', 'biography', 'homepage'
       ]);
    }

    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->sortByDesc('popularity')->take(5)->map(function($movie) {
            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185'.$movie['poster_path']
                    : 'https://via.placeholder.com/185x278',
                'title' => $title,
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movies.show', $movie['id']) : route('tv.show', $movie['id'])
            ])->only([
                'id', 'title', 'poster_path', 'linkToPage', 'media_type'
            ]);
        });
    }

    public function credits()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->map(function($movie) {
            if (isset($movie['release_date'])) {
                $releaseDate = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $releaseDate = $movie['first_air_date'];
            } else {
                $releaseDate = '';
            }

            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : '',
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movies.show', $movie['id']) : route('tv.show', $movie['id'])
            ])->only([
                'release_date', 'release_year', 'title', 'character', 'linkToPage'
            ]);
        })->sortByDesc('release_date');
    }
}
