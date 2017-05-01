<!DOCTYPE html>

<html lang="en">

<head>
    @include('includes.head')
</head>

<body>

    <div id="page" class="container">

        <header>
            @include('includes.header')
        </header>

        <div id="main">
            @yield('content')
        </div>

        <footer>
            @include('includes.footer')
        </footer>

    </div>

    @stack('lazy_scripts')

</body>

</html>