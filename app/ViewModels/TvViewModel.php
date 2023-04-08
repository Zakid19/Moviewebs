<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRated;
    public $genres;

    public function __construct($popularTv, $topRated, $genres)
    {
        $this->popularTv = $popularTv;
        $this->topRated =  $topRated;
        $this->genres = $genres;
    }

    public function genres()
    {
        // Mengambil data Genre List id ke name
        return collect($this->genres)->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function formatTv($tv)
    {
        return collect($tv)->map(function($tvshow) {
            //Memanggil data Genre dari Genre List
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function($genre) {
                return [$genre => $this->genres()->get($genre)];
            })->implode(', ');

            // Menggabungkan (Merge) data Tv untuk ditampilkan
            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 . '%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'id', 'name', 'genre_ids', 'poster_path', 'vote_average', 'first_air_date', 'genres', 'overview'
            ]);
        });
    }

    public function popularTv()
    {
       return $this->formatTv($this->popularTv);
    }

    public function topRated()
    {
       return $this->formatTv($this->topRated);
    }
}
