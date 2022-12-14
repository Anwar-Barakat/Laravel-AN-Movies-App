<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;

    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }

    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path'       => 'https://image.tmdb.org/t/p/w300/' . $this->tvshow["poster_path"],
            'vote_average'      => $this->tvshow['vote_average'] * 10 . '%',
            'first_air_date'    => Carbon::parse($this->tvshow['first_air_date'])->format('d M, Y'),
            'geners'            => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', ')
        ]);
    }
}