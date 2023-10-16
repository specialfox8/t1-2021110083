<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="btn btn-sm btn-outline-secondary" href="http://127.0.0.1:8000">home</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="{{ Route('landing') }}">T1-2021110083</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">

                    <a class="btn btn-sm btn-outline-secondary" href="http://127.0.0.1:8000/articles/create">Tambah
                        Buku</a>

                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3" style="background-color:#05648a">
            <nav class="nav d-flex justify-content-between ">
                <a class="p-2 link-secondary text-light" href="#">Uncategorized</a>
                <a class="p-2 link-secondary text-light" href="#">Science Fiction</a>
                <a class="p-2 link-secondary text-light" href="#">Novel</a>
                <a class="p-2 link-secondary text-light" href="#">History</a>
                <a class="p-2 link-secondary text-light" href="#">Biography</a>
                <a class="p-2 link-secondary text-light" href="#">Romance</a>
                <a class="p-2 link-secondary text-light" href="#">Education</a>
                <a class="p-2 link-secondary text-light" href="#">Culinary</a>
                <a class="p-2 link-secondary text-light" href="#">Comic</a>
            </nav>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>


    <footer class="blog-footer" style="background-color:#05648a">

        <p style="color: black">Copyright © {{ date('Y') }}
            <a style="color: black" href="/">t1-2021110083</a> -
            <a href="{{ route('contact-us.index') }}">Subscribe</a>
        </p>
        <p>
            <a style="color: black" href="#">Back to top</a>
        </p>
    </footer>

</body>

</html>
