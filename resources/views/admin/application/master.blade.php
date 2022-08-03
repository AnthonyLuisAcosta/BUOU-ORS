<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    
</head>

<body class="font-sans antialiased">

    <x-jet-banner />

    <div class=" bg-gray-100">


        <div class="sidebar">
            <!-- Page Heading -->
            <div class="Nav h-16 border-b bg-white border-black-100">
                @livewire('navigation-menu')
            </div>
        </div>

        <div class="content">
            <!-- Page Content -->
            <main class="contentbox m-6">  
                 @yield('content')
            </main>
        </div>




    </div>
    <div>
        @stack('modals')

        @livewireScripts

</body>


<!--responsive content CSS>-->
<style>
    html{
        background-color: rgb(235, 235, 235);
    }
    .content {
        margin-left: 250px;
        padding: 1px 16px;
        height: 1000px;
        background-color: rgb(235, 235, 235);
    }

    @media screen and (max-width: 640px) {

        .content {
            margin-left: 0;
        }

        .Nav {
            height: auto;
        }
            
    }
</style>

</html>