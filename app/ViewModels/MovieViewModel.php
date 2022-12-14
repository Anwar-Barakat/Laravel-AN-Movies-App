<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path'   => 'https://image.tmdb.org/t/p/w300/' . $this->movie["poster_path"],
            'vote_average'  => $this->movie['vote_average'] * 10 . '%',
            'release_date'  => Carbon::parse($this->movie['release_date'])->format('d M, Y'),
            'geners'        => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', ')
        ]);
    }
}