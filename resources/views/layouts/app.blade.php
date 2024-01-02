<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src = "{{asset('js/my.js')}}"></script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            

        <header class = "flex justify-between border-bottom-double border-2">
        <div class = "flex flex-col items-start border-2 rounded-lg m-5">            
            <img src="{{asset('images/logo.png')}}" alt="logo" class = "m-5 w-40 max-w-xs">
            <h2 class = "font-bold text-lg self-center">AWE COMPONENT 2</h2>
        </div>  
        <div>
        @auth
        @include('layouts.settings_dropdown') 
        @endauth
        @guest
         <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
          @if (Route::has('register'))
               <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
          @endif  
        @endguest   
        </div>
    </header>
            <main class="border-bottom-double border-2">
            <!-- Menu -->
            @include('layouts.menu')   
            
            <!-- {{$slot ?? ''}} -->

            </main>
                    <!-- Page Content -->
            
            <div class="product-list">
             @yield('content')
            </div>
            
        </div>
    </body>
</html>
