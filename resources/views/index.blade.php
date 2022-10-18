@extends('layouts.master')

@section('content')
    <div class="container mx-auto  px-4 py-6">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popluar movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>

        <h2
            class="uppercase tracking-wider text-orange-500 text-lg font-semibold border-t border-gray-800 shadow-md mt-16 pt-4">
            Now Playing</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>
@endsection
