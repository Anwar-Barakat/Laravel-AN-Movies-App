<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies     = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/movie/popular?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1')
            ->json()['results'];

        $genresArray     = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US')
            ->json()['genres'];

        $nowPlayingMovies     = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1')
            ->json()['results'];

        $genres = collect($genresArray)->mapWithKeys(fn ($genre) => [$genre['id'] => $genre['name']]);

        dump($nowPlayingMovies);

        return view('index', [
            'popularMovies'     => $popularMovies,
            'genres'            => $genres,
            'nowPlayingMovies'  => $nowPlayingMovies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}