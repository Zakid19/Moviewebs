<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowModel;
use App\ViewModels\TvViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller
{
    public function index()
    {
        $popularTv = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/tv/popular')
                    ->json()['results'];

        $topRated = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/tv/top_rated')
                    ->json()['results'];

        $genres     = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/genre/tv/list')
                    ->json()['genres'];

        $viewModel = new TvViewModel(
            $popularTv, $topRated, $genres
        );

       return view('tv.index', $viewModel);
    }

    public function show($id)
    {
        $tvshow = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
                ->json();

        $showModel = new TvShowModel($tvshow);

       return view('tv.show', $showModel);
    }
}
