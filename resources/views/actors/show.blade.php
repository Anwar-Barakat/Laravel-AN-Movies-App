@extends('layouts.master')

@section('content')
    <div class="actor-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="" class="w-76 main-shadow">
                <ul class="flex items-center mt-4 flex-wrap w-full gap-2">
                    @if ($social['facebook'])
                        <li class="w-10 h-10">
                            <a href="{{ $social['facebook'] }}" title="facebook">
                                <img src="{{ asset('assets/socials/facebook-svgrepo-com.svg') }}" alt="">
                            </a>
                        </li>
                    @endif
                    @if ($social['instagram'])
                        <li class="w-10 h-10">
                            <a href="{{ $social['instagram'] }}" title="instagram">
                                <img src="{{ asset('assets/socials/instagram-svgrepo-com.svg') }}" alt="">
                            </a>
                        </li>
                    @endif
                    @if ($social['twitter'])
                        <li class="w-10 h-10">
                            <a href="{{ $social['twitter'] }}" title="twitter">
                                <img src="{{ asset('assets/socials/twitter-svgrepo-com.svg') }}" alt="">
                            </a>
                        </li>
                    @endif
                    @if ($actor['homepage'])
                        <li class="w-10 h-10">
                            <a href="{{ $actor['homepage'] }}" title="website">
                                <img src="{{ asset('assets/socials/internet-svgrepo-com.svg') }}" alt="">
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="md:ml-24 md:mt-0 mt-6">
                <h1 class="text-2xl font-semibold">{{ $actor['name'] }}</h1>
                <div class="flex items-center text-gray-400 text-sm mt-1 flex-wrap">
                    <span class="ml-1">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old ) in
                        {{ $actor['place_of_birth'] }}</span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>
                <h4 class="font-semibold mt-12">Knows For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @if (count($knownForMovies) > 0)
                        @foreach ($knownForMovies as $movie)
                            <div class="mt-4">
                                <a href="{{ $movie['link'] }}">
                                    <img src="{{ $movie['poster_path'] }}" alt="poster"
                                        class="hover:opacity-75 transition ease-in-out duration-150 main-shadow">
                                    <a href="{{ $movie['link'] }}"
                                        class="text-sm leading-normal block text-gray-400 hover:text-white mt-2 ">
                                        {{ $movie['title'] }}
                                    </a>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-2xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong>
                        {{ $credit['character'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
