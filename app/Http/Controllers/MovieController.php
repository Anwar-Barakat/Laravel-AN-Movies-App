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
        $data['popularMovies']          = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/movie/popular?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1')
            ->json()['results'];

        $data['genresArray']            = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US')
            ->json()['genres'];

        $data['nowPlayingMovies']       = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1')
            ->json()['results'];

        $data['genres']                 = collect($data['genresArray'])->mapWithKeys(fn ($genre) => [$genre['id'] => $genre['name']]);

        return view('index', $data);
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
     * @param  int  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['movie']     = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1&append_to_response=credits,videos,images')
            ->json();

        return view('show', $data);
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