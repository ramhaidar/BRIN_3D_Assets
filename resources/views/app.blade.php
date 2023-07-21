<!DOCTYPE html>
<html data-bs-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" charset="utf-8"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>@yield('title') | BRIN 3D Assets</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Play:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <style>
        .nav-link.active {
            color: #BE3535 !important;
        }

        .nav-link {
            color: #222222 !important;
        }

        .poppins-regular {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
        }

        .poppins-bold {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }
    </style>

    @yield('customStyle')
</head>

<body>
    <nav
        class="navbar navbar-expand-md navbar-light fixed-top mb-4 py-4 bg-light border-bottom border-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="d-inline-block align-text-top ms-5 mx-3" src="{{ asset('Logo/Alt_Logo_BRIN 1.png') }}"
                    width="auto" height="30">
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" type="button"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link fw-medium poppins-regular {{ $activeNavItem == 'home' ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium poppins-regular {{ $activeNavItem == 'explore' ? 'active' : '' }}"
                            href="{{ route('explore') }}">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium poppins-regular {{ $activeNavItem == 'about_us' ? 'active' : '' }}"
                            href="{{ route('about_us') }}">About Us</a>
                    </li>
                </ul>
                <div class="me-5">
                    <a href="{{ url()->current() }}" style="text-decoration: none">
                        <img class="d-inline-block align-text-top px-3" src="{{ asset('Icon/download.png') }}"
                            width="auto" height="30">
                    </a>
                    <a href="{{ url()->current() }}" style="text-decoration: none">
                        <img class="d-inline-block align-text-top px-3" src="{{ asset('Icon/fav.png') }}"
                            width="auto" height="30">
                    </a>
                    <a href="{{ url()->current() }}" style="text-decoration: none">
                        <img class="d-inline-block align-text-top px-3" src="{{ asset('Icon/account.png') }}"
                            width="auto" height="30">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="mb-4"><br><br></div>

    @yield('content_01')

    <!-- Bootstrap 5.3.0 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
