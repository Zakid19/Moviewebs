<?php

namespace App\Http\Controllers;

use App\ViewModels\MovieShowModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/popular')
                        ->json()['results'];

        $nowPlaying = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/movie/now_playing')
                    ->json()['results'];

        $genres     =  Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/genre/movie/list')
                    ->json()['genres'];

        $viewModel =  new MoviesViewModel($popularMovies, $nowPlaying, $genres);

       return view('movies.index', $viewModel);
    }

    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/'.$id .'?append_to_response=credits,videos,images')
                ->json();

        $popularMovies = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/popular')
                        ->json()['results'];

        $showModel = new MovieShowModel($movie);
       return view('movies.show', $showModel, compact('popularMovies'));
    }
}
