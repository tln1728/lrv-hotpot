<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- vite(['resources/js/app.js', 'resources/css/app.css']) -->
</head>

<body>
    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">Flowbite</span>
            </a>

            <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
                @auth
                <button type="button" data-dropdown-toggle="user-profile-dropdown"
                    class="font-medium rounded-full bg-gray-300 text-sm p-2 text-center me-2 mb-2">
                    👤
                </button>
                @include('layout.user-profile-dropdown')
                @endauth

                @guest
                    @include('auth.login')
                    @include('auth.register')
                @endguest
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-language">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">
                            {{__('public.home')}}
                        </a>
                    </li>

                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">
                            {{__('public.about')}}
                        </a>
                    </li>

                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">
                            {{__('public.services')}}
                        </a>
                    </li>

                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">
                            {{__('public.contact')}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if ($errors->any())
    <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <main class="max-w-screen-xl mx-auto p-4">
        @if (session() -> has('success'))
        <x-btn-alert>{{session('success')}}</x-btn-alert>
        @endif

        @if (session() -> has('error'))
        <x-btn-alert color="red">{{session('error')}}</x-btn-alert>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>