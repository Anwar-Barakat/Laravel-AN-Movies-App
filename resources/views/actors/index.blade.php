@extends('layouts.master')

@section('content')
    <div class="container mx-auto  px-4 py-16">
        <div class="popular-actorss">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popluar Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="">
                            <img src="{{ $actor['profile_path'] }}" alt=""
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">Lorem ipsum dolor sit amet.</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
