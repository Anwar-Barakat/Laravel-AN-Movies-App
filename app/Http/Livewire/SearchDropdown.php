<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public  $search = '';

    public function render()
    {
        $searchResults      = [];

        if (strlen($this->search) > 1)
            $searchResults      = Http::withToken('services.tmdb.token')
                ->get('https://api.themoviedb.org/3/search/movie/?api_key=f1717ef8baf4c215e7bc86e8c5f39960&language=en-US&page=1&query=' . $this->search)
                ->json()['results'];

        return view('livewire.search-dropdown', ['searchResults' => collect($searchResults)->take(7)]);
    }
}