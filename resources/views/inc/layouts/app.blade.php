<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
    <title>@yield('title') - {{config('app.name')}}</title>
    @else
    <title>{{config('app.name')}}</title>
    @endif


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-200 min-h-screen font-base">
    <div class="w-full text-center">
        <div class="block sm:hidden">ALL - PHONE - 640px</div>
        <div class="hidden sm:block md:hidden">SM - LANDSCAPE PHONE - 640px</div>
        <div class="hidden md:block lg:hidden">MD - TABLET - 768px</div>
        <div class="hidden lg:block xl:hidden">LG - LANDSCAPE TABLET - 1024px</div>
        <div class="hidden xl:block">XL - DESKTOP - 1280px</div>
    </div>
    <div id="app">
        @include('inc.layouts.nav')
        @yield('header')
        <main>
            <div class="container mx-auto py-6 sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    @livewireScripts
</body>

</html>