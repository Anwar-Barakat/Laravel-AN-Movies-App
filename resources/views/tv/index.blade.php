@extends('layouts.master')

@section('content')
    <div class="container mx-auto  px-4 py-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popluar shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" />
                @endforeach
            </div>
        </div>

        <div class="now-playing py-24">
            <h2
                class="uppercase tracking-wider text-orange-500 text-lg font-semibold border-t border-gray-800 shadow-md mt-16 pt-4">
                Top rated shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
                {{-- @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
