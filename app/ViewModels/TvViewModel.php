<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv, $topRatedTv, $genres;

    public function __construct($popularTv, $topRatedTv, $genres)
    {
        $this->popularTv = $popularTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
    }

    public function popularTv()
    {
        return $this->formatMovie($this->popularTv);
    }

    public function topRatedTv()
    {
        return $this->formatMovie($this->topRatedTv);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(fn ($genre) => [$genre['id'] => $genre['name']]);
    }

    protected function formatMovie($tv)
    {
        return collect($tv)->map(function ($tvshow) {

            $genersFormatted = collect($tvshow['genre_ids'])->mapWithKeys(fn ($v) => [$v => $this->genres()->get($v)])->implode(', ');

            return collect($tvshow)->merge([
                'poster_path'       => 'https://image.tmdb.org/t/p/w500/' . $tvshow["poster_path"],
                'vote_average'      => $tvshow['vote_average'] * 10 . '%',
                // 'first_air_date'    => Carbon::parse($tvshow['first_air_date'])->format('d M, Y'),
                'genres'            => $genersFormatted,
            ])
                ->only(['id', 'poster_path', 'gerne_ids', 'name', 'vote_average',  'overview', 'first_air_date', 'genres']);
        });
    }
}