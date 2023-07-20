<!DOCTYPE html>
<html data-bs-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" charset="utf-8"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>About Us</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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
            font-weight: 400;
        }

        html,
        body,
        .container-fluid {
            height: 92.5%;
        }
    </style>
</head>

<body>
    <nav
        class="navbar navbar-expand-md navbar-light fixed-top mb-4 py-4 bg-light border-bottom border-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url()->current() }}">
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
                        <a class="nav-link fw-medium poppins-regular" href="{{ url()->current() }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium poppins-regular" href="{{ url()->current() }}">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium poppins-regular active" href="{{ url()->current() }}">About Us</a>
                    </li>
                </ul>
                <div class="me-5">
                    <a href="{{ url()->current() }}" style="text-decoration: none">
                        <img class="d-inline-block align-text-top px-3" src="{{ asset('Icon/download.png') }}"
                            width="auto" height="30">
                    </a>
                    <a href="{{ url()->current() }}" style="text-decoration: none">
                        <img class="d-inline-block align-text-top px-3" src="{{ asset('Icon/fav.png') }}" width="auto"
                            height="30">
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

    <main class="container-fluid d-flex justify-content-center align-items-center">
        <div class="pt-5">
            @yield('content_01')
        </div>
    </main>

    <!-- Bootstrap 5.3.0 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
