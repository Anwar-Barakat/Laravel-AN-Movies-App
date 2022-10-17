<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AN Movies App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row gap-2 items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center justify-between">
                <li class="flex items-center gap-2">
                    <a href="https://postimages.org/" target="_blank"><img
                            src="https://i.postimg.cc/Dz6pXJKg/IMG-20220826-173001-148-removebg-preview.png"
                            alt="IMG-20220826-173001-148-removebg-preview" class="w-12 sm:w-10" /></a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex items-center">
                <div class="relative">
                    <input type="text" class="bg-gray-800 rounded-full md:w-64 w-48 px-4 py-1 focus:outline-none"
                        placeholder="Search...">
                    <div class="absolute top-0 right-0">
                        <svg class="fill-current text-gray-500 w-4 mt-2 mr-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
