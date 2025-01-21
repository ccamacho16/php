<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
        {{-- @vite(['public/css/app.css', 'public/js/app.js']) --}}
        
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            
            <div class="flex h-screen">

               {{-- MENU Sidebar --}} 
               {{-- @include('layouts.sidebar')   --}}
               
               <div class="w-full">
                  <!-- Page Content -->

                  <main> 
                     {{-- @include('partials.alerts') --}}
                        {{ $slot }}
                  </main>
               </div>

            </div>
            <!-- Page Content -->
            {{-- <main>  --}}
                {{-- @include('partials.alerts') --}}
{{--                   {{ $slot }}
            </main> --}}
        </div>

        

        @livewireScripts
        <script src="{{ asset('js/layouts.sidebar.js') }}"></script> 
        <script src="{{ asset('js/components.alerts.js') }}"></script>
        <script src="{{ asset('js/components.confirmation.js') }}"></script> 
        <script src="{{ asset('js/components.confirmation.array.js') }}"></script>
        <script src="{{ asset('js/components.lockerpanel.js') }}"></script>
    </body>
</html>


