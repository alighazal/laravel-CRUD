<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('title')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
                background-color: wheat;
                padding: 10px;
            }
        </style>
    </head>
    <body class="antialiased">
    <nav class = "p-6 bg-white flex justify-between mb-5">
        <ul class = "flex ">
            <li class = "mr-3">
                <a href = "{{route('home')}}" > Home </a>
            </li>
            
            <li class = "mr-3">
                <a href="{{route('tickets.index')}}"> Tickets </a>
            </li>

        </ul>

        <ul class = "flex items-center ">

            @auth

            <li class = "mr-5">
                <a href=""> {{auth()->user()->name}} </a>
            </li>
            <li class = "mr-3">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit"> Logout </button>
                </form>
            </li>
            @endauth
            


           @guest            
            <li class = "mr-3">
                <a href="{{route('login')}}"> Login </a>
            </li>

            <li class = "mr-3">
                <a href= "{{route('register')}}" > Register </a>
            </li>
            @endguest
    
            

        </ul>

    </nav>
    
    @yield('content')
    
    </div>
    </body>
</html>
