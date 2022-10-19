<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AN Movies App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row gap-2 items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center justify-between">
                <li class="flex items-center gap-2">
                    <a href="{{ route('movies.index') }}" target="_blank"><img
                            src="https://i.postimg.cc/Dz6pXJKg/IMG-20220826-173001-148-removebg-preview.png"
                            alt="IMG-20220826-173001-148-removebg-preview" class="w-12 sm:w-10" /></a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex items-center">
                @livewire('search-dropdown')
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
</body>

</html>
