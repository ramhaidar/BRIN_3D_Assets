<!DOCTYPE html>
<html data-bs-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" charset="utf-8"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>@yield('title') | BRIN 3D Assets</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Play:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons 1.11.0 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        rel="stylesheet" />

    <!-- Bootstrap 5.3.2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />

    <!-- JQuery 3.7.1-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

        .montserrat-regular {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
        }

        .montserrat-bold {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        .mulish-regular {
            font-family: 'Mulish', sans-serif;
            font-weight: 400;
        }

        .mulish-bold {
            font-family: 'Mulish', sans-serif;
            font-weight: 700;
        }

        .customimg {
            width: 100%;
            object-fit: cover;
            aspect-ratio: 16/9;
        }

        .customShadow {
            filter: drop-shadow(0px 0px 5px rgba(0, 0, 0, 0.25));
        }

        body.modal-open .supreme-container {
            -webkit-filter: blur(3px);
            -moz-filter: blur(3px);
            -o-filter: blur(3px);
            -ms-filter: blur(3px);
            filter: blur(3px);
        }

        .fav-btn {
            position: absolute;
            top: -25px;
            right: 80px;
            border-radius: 50%;
        }

        .download-btn {
            position: absolute;
            top: -35px;
            right: -10px;
            border-radius: 50%;
        }

        #Loader {
            background-color: rgba(125, 125, 125, 0.5);
            position: fixed;
            z-index: 9999;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            display: block;
        }

        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
    </style>

    @yield('customStyle')

    @yield('topScript')
</head>

<div class="container-fluid" id="Loader">
    <div class="center-content">
        <img src="{{ asset('Loading/Infinity.gif') }}" />
    </div>
</div>

<body>
    @auth
        <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="logoutModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Sign Out</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to Sign Out of your account?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger" type="submit" style="width: 100px">Yes</button>
                        </form>
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                            style="width: 100px">No</button>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <div class="modal fade" id="popupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notification</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="pt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <ul class="pt-2">
                                {{ session()->get('success') }}
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('customError'))
                        <div class="alert alert-danger">
                            <ul class="pt-2">
                                {{ session()->get('customError') }}
                            </ul>
                        </div>
                    @endif

                    <div class="alert alert-danger" id="customError2" style="display: none">
                        <ul class="pt-2">
                            <li id="customError2Text">yntkts</li>
                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="shareModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title poppins-bold">Share this Asset</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h6 class="ps-1 pb-2 poppins-regular" for="shareLink">Click to Copy</h6>
                    <div class="alert alert-secondary">
                        <ul class="pt-2">
                            <a class="text-decoration-none" href="#">
                                <li id="shareLink" onclick="copyToClipboard()">Link copied to clipboard</li>
                            </a>
                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notObjFileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-0 py-0 pe-3">
                <div class="modal-header">
                    <h5 class="modal-title">Upload error</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body px-0 py-0">

                    <div class="px-0 py-0">
                        <ul class="pt-2">
                            <p>Your file are not supported.
                                Check out our supported formats and our exporters.
                                You may contact us if you think this file type should be supported.</p>
                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>

    <nav
        class="supreme-container navbar navbar-expand-md navbar-light fixed-top mb-4 py-4 bg-light border-bottom border-secondary-subtle">
        <div class="container-fluid">
            <div class="ms-5"></div>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="align-text-top px-2" src="{{ asset('Logo/Alt_Logo_BRIN 1.png') }}" width="auto"
                    height="30">
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
            </div>
        </div>
        <div class="container-fluid justify-content-end">
            <div class="d-flex flex-row align-items-end">
                @guest
                    <div class="col-6 px-0">
                        <a class="btn rounded-pill shadow-sm" href="{{ route('signup') }}" role="button"
                            style="background-color: #E67E22; color: white; --bs-btn-padding-y: .40rem; --bs-btn-padding-x: 1.5rem;">Sign
                            Up</a>
                    </div>
                    <div class="col-6 px-0 me-5">
                        <a class="btn rounded-pill shadow-sm" href="{{ route('signin') }}" role="button"
                            style="background-color: #3498DB; color: white; --bs-btn-padding-y: .40rem; --bs-btn-padding-x: 1.5rem;">Sign
                            In</a>
                    </div>
                @endguest
                @auth
                    @if ($activeNavItem != 'dashboard_user_uploads')
                        <div class="col-6 px-0">
                            <a class="btn rounded-pill shadow-sm" href="{{ route('dashboard_user') }}" role="button"
                                style="background-color: green; color: white; --bs-btn-padding-y: .40rem; --bs-btn-padding-x: 1.5rem;">Dashboard</a>
                        </div>
                        <div class="col-6 px-0 me-5">
                            <button class="btn rounded-pill shadow-sm" data-bs-toggle="modal"
                                data-bs-target="#logoutModal" type="button"
                                style="background-color: grey; color: white; --bs-btn-padding-y: .40rem; --bs-btn-padding-x: 1.5rem;">
                                Sign Out
                            </button>
                        </div>
                    @else
                        <div class="col-6 px-0">
                            <a class="btn rounded-pill shadow-sm" href="{{ route('home') }}" role="button"
                                style="background-color: blue; color: white; --bs-btn-padding-y: .40rem; --bs-btn-padding-x: 1.5rem;">Home</a>
                        </div>
                        <div class="col-6 px-0 me-5">
                            <button class="btn rounded-pill shadow-sm" data-bs-toggle="modal"
                                data-bs-target="#logoutModal" type="button"
                                style="background-color: grey; color: white; --bs-btn-padding-y: .40rem; --bs-btn-padding-x: 1.5rem;">
                                Sign Out
                            </button>
                        </div>
                    @endif

                @endauth
            </div>
        </div>
    </nav>

    <div class="mb-4"><br><br></div>

    <div class="px-0 py-0 mx-0 my-0 w-100 h-100 supreme-container">
        @yield('content_01')

        @yield('footerx')
    </div>

    <!-- Bootstrap 5.3.2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>

    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>

    @yield('bottomScript')
</body>

</html>
