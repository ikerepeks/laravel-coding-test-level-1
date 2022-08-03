<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.partials.head')
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <h1 class="navbar-brand text-center">Events</h1>
            </div>
        </nav>
        @include('layout.partials.header')
            @yield('content')
        @include('layout.partials.footer')
    </body>
</html>
