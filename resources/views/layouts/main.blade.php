<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>{{env('APP_NAME')}} Inventory</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/inventory-manager/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('vendor/inventory-manager/css/dashboard.css') }}" >


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{env('APP_NAME')}} Inventory</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <!--
            <a class="nav-link" href="#">Sign out</a>
            -->
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('inventory')}}">
                            <span data-feather="shopping-cart"></span>
                            Inventory Items
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('inventory/categories')}}">
                            <span data-feather="layers"></span>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('inventory/stock')}}">
                            <span data-feather="bar-chart-2"></span>
                            Stock
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <br/>
            <h2>@yield('title')</h2>
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('vendor/inventory-manager/js/jquery-3.3.1.slim.min.js') }}" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="{{ asset('vendor/inventory-manager/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/inventory-manager/js/feather.min.js') }}"></script>
<script src="{{ asset('vendor/inventory-manager/js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/inventory-manager/js/dashboard.js') }}"></script></body>
@yield('scripts')
</html>
