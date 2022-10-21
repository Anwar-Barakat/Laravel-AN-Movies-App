@extends('layouts.master')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-64 lg:w-96">
            <div class="md:ml-24 md:mt-0 mt-6">
                <h1 class="text-2xl font-semibold">{{ $movie['title'] }}</h1>
                <div class="flex items-center text-gray-400 text-sm mt-1 flex-wrap">
                    <span class="text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25"
                            stroke="currentColor" class="w-5 h-5 text-orange-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">
                        {{ $movie['geners'] }}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-10">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex gap-4 mt-4 flex-col md:flex-row">
                        @php
                            $crewsArray = $movie['credits']['crew'];
                            $crews = array_map(function ($i) use ($crewsArray) {
                                return $crewsArray[$i];
                            }, array_rand($crewsArray, 2));
                        @endphp
                        @foreach ($crews as $crew)
                            <div>
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-data="{ isOpen: false }" @click.away="isOpen=false">
                    @if (count($movie['videos']['results']) > 0)
                        <div class="mt-6">
                            <button @click="isOpen=true"
                                href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                                class="inline-flex items-center gap-2 w-fit  bg-orange-500 text-gray-900 rounded font-semibold p-4 hover:bg-orange-700 transition ease-in-out duration-150 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>
                                Play Movie
                            </button>
                        </div>
                    @endif

                    <div style="background-color: rgba(0, 0, 0, 0.5)"
                        class="fixed top-0 left-0 w-full h-full flex items-center justify-center shadow-lg overflow-y-auto"
                        x-show="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto w-fit">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button class="text-3xl leading-none hover:text-gray-300" @click="isOpen=false">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body p-8">
                                    <div class="responsive-container overflow-hidden relative">
                                        <iframe width="560" height="315"
                                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-2xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @if (count($movie['credits']['cast']) > 0)
                    @php
                        $castsArray = $movie['credits']['cast'];
                        $casts = array_map(function ($i) use ($castsArray) {
                            return $castsArray[$i];
                        }, array_rand($castsArray, 5));
                    @endphp
                    @forelse ($casts as $cast)
                        <div class="mt-8">
                            <a href="#" class="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt=""
                                    class="hover:opacity-75 transition ease-in-out">
                            </a>
                            <div>
                                <a href="" class="text-xl mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            </div>
                            <div>
                                <a href=""
                                    class="text-lg mt-2 hover:text-gray-300 text-gray-500">{{ $cast['character'] }}</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection
