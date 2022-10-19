<div class="relative">
    <input type="text" class="bg-gray-800 rounded-full md:w-64 w-48 px-4 py-1 focus:outline-none"
        placeholder="Search..." wire:model.debounce.350ms="search">
    <div wire:loading class="spinner  top-0 right-0 mt-4 mr-3"> </div>
    <div class="absolute bg-gray-800 rounded drop-shadow-md text-sm w-64 mt-2 overflow-hidden">
        @if (count($searchResults) > 0)
            <ul>
                @forelse ($searchResults as $movie)
                    <li class="border-b border-gray-600">
                        <a href="{{ url('/movies/' . $movie['id']) }}"
                            class="block hover:bg-gray-600 p-3 flex items-center gap-3">
                            @if ($movie['poster_path'])
                                <img src="{{ 'https://image.tmdb.org/t/p/w92/' . $movie['poster_path'] }}"
                                    class="w-8" alt="">
                            @else
                                <img src="https://via.placeholder.com/50x75" class="w-8" alt="">
                            @endif
                            <span>{{ $movie['title'] }}</span>
                        </a>
                    </li>
                @empty
                    <li class="border-b border-gray-600">
                        <a href="javascript:void(0);" class="block hover:bg-gray-600 p-3">No Results</a>
                    </li>
                @endforelse
            </ul>
        @endif

    </div>
</div>
