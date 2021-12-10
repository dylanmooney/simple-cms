<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')


        <div class="flex h-screen rounded-lg">
            <div class="hidden md:flex md:flex-shrink-0">
                <div class="flex flex-col w-64">
                    <div class="flex flex-col flex-grow pt-5 overflow-y-auto  bg-neutral">
                        <div class="flex flex-col items-center flex-shrink-0 px-4">
                            <h2
                                class="block p-2 text-xl font-bold tracking-tighter transition duration-500 ease-in-out transform cursor-pointer text-white ">
                                SimpleCMS
                            </h2>
                        </div>
                        <div class="flex flex-col flex-grow  mt-5">
                            <nav class="flex-1 space-y-1 bg-neutral">
                                <ul class="menu py-3 bg-neutral text-neutral-content">
                                    <li class="{{request()->routeIs('admin.posts.*') ? 'bordered' : ''}}">
                                        <a href={{route("admin.posts.index")}} class="menu-parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            Posts
                                        </a>

                                        @if (request()->routeIs('admin.posts.*'))
                                        <ul class="menu bg-neutral-focus -ml-6">
                                            <li class="">
                                                <a href={{route("admin.posts.index")}} style="border-left: 0px">
                                                    All Posts
                                                </a>
                                            </li>
                                            <li>
                                                <a href={{route("admin.posts.create")}} style="border-left: 0px">
                                                    Add Post
                                                </a>
                                            </li>
                                        </ul>
                                        @endif
                                    </li>
                                    <li class="hover-bordered hover:bg-neutral-focus transition-colors">
                                        <a>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            Users
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col flex-1 w-0 overflow-hidden">
                <main class="relative flex-1 overflow-y-auto focus:outline-none">
                    <div class="py-6">
                        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                            <div class="py-4">
                                <main>
                                    {{ $slot }}
                                </main>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
