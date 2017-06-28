<!DOCTYPE html>

<html lang="en">

<head>
    @include('includes.head')
</head>

<body>

    <div style="height: 0; width: 0; position: absolute; visibility: hidden">
        {!! include( resource_path() . '/assets/svg/svg.svg' ) !!}
    </div>

    <div id="page" class="container">

        <header>
            @include('includes.header')
        </header>

        <div id="main">

            <nav id="menu">
                @include('includes.menu')
            </nav>

            <div id="content">
                @yield('content')
            </div>
        </div>

        <footer>
            @include('includes.footer')
        </footer>

    </div>

    @stack('lazy_scripts')

</body>

</html>