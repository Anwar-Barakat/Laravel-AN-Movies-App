@extends('layouts.master')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                class="w-64 lg:w-96">
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
                    <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}
                            {{ !$loop->last ? ',' : '' }}
                        @endforeach
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
                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-6">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                            class="inline-flex items-center gap-2 w-fit  bg-orange-500 text-gray-900 rounded font-semibold p-4 hover:bg-orange-700 transition ease-in-out duration-150 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                            Play Movie
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-2xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @php
                    $castsArray = $movie['credits']['cast'];
                    $casts = array_map(function ($i) use ($castsArray) {
                        return $castsArray[$i];
                    }, array_rand($castsArray, 10));
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

            </div>
        </div>
    </div>
    @php
        $images = $movie['images']['backdrops'];
    @endphp
    @if (count($images))
        <div class="movie-cast border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-2xl font-semibold">Images</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
                    @forelse ($images as $image)
                        <div class="mt-8">
                            <a href="#" class="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt=""
                                    class="hover:opacity-75 transition ease-in-out">
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    @endif
@endsection
