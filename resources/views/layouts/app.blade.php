<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('styles')
    <title>Система учета товароборота</title>
</head>

<body>

    <body style="">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Система учета товароборота</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Поиск" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Выход</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                @include('partials.nav')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <span
            style="margin: 0px auto; border: 2px dotted rgb(0, 0, 0); position: absolute; z-index: 2147483647; visibility: hidden; left: 160px; width: 23px; top: 648px; height: 94px;"></span><span
            style="z-index: 2147483647; position: absolute; visibility: hidden; left: 168px; width: 50px; top: 727px; height: 20px; font-size: 10px; color: black;">0</span>
    </body>

</body>
<script src="{{ asset('js/index.js') }}"></script>

</html>
