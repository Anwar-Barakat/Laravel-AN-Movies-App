<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowViewModel;
use App\ViewModels\TvViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularTv          = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/tv/popular?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1')
            ->json()['results'];

        $topRatedTv       = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/tv/top_rated?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1')
            ->json()['results'];

        $genres            = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/genre/tv/list?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US')
            ->json()['genres'];

        $viewModel = new TvViewModel(
            $popularTv,
            $topRatedTv,
            $genres
        );
        return view('tv.index', $viewModel);
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
        $tvshow     = Http::withToken('services.tmdb.token')
            ->get('https://api.themoviedb.org/3/tv/' . $id . '?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1&append_to_response=credits,videos,images')
            ->json();

        $viewModel = new TvShowViewModel($tvshow);

        return view('tv.show', $viewModel);
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