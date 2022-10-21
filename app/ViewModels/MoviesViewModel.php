<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies, $nowPlayingMovies, $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies()
    {
        return $this->formatMovie($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovie($this->nowPlayingMovies);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(fn ($genre) => [$genre['id'] => $genre['name']]);
    }

    protected function formatMovie($movie)
    {
        return collect($movie)->map(function ($movie) {

            $genersFormatted = collect($movie['genre_ids'])->mapWithKeys(fn ($v) => [$v => $this->genres()->get($v)])->implode(', ');

            return collect($movie)->merge([
                'poster_path'   => 'https://image.tmdb.org/t/p/w300/' . $movie["poster_path"],
                'vote_average'  => $movie['vote_average'] * 10 . '%',
                'release_date'  => Carbon::parse($movie['release_date'])->format('d M, Y'),
                'genres'        => $genersFormatted,
            ])
                ->only(['id', 'poster_path', 'gerne_ids', 'title', 'vote_average', 'title', 'overview', 'release_date', 'genres']);
        });
    }
}