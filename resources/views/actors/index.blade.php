@extends('layouts.master')

@section('content')
    <div class="container mx-auto  px-4 py-16">
        <div class="popular-actorss">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popluar Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            <img src="{{ $actor['profile_path'] }}" alt=""
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actor['id']) }}"
                                class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-16">
                @if ($previous)
                    <a href="/actors/page/{{ $previous }}"
                        class="inline-flex items-center gap-2 w-fit  bg-orange-500 text-gray-900 rounded font-semibold py-2 px-4 hover:bg-orange-700 transition ease-in-out duration-150 ">Previous</a>
                @else
                    <div></div>
                @endif
                @if ($next)
                    <a href="/actors/page/{{ $next }}"
                        class="inline-flex items-center gap-2 w-fit  bg-orange-500 text-gray-900 rounded font-semibold py-2 px-4 hover:bg-orange-700 transition ease-in-out duration-150 ">Next</a>
                @else
                    <div></div>
                @endif
            </div>
        </div>
    </div>
@endsection
