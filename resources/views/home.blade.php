@section('title', 'Home')

@extends('app')
@extends('footer')

@section('customStyle')
    <style>
        #selector.nav-link.active {
            color: #BE3535 !important;
            border-bottom: 2px solid #BE3535;
        }

        #selector.nav-link:not(.active) {
            color: #BFBFBF !important;
            border-bottom: 2px solid #D4D4D4;
        }

        #underlineBG {
            color: #BFBFBF !important;
            border-bottom: 2px solid #D4D4D4;
        }

        #circleButton {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
        }

        .customShadow {
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        }

        .card-body {
            position: relative;
        }

        .fav-btn {
            position: absolute;
            top: -25px;
            right: 80px;
            border-radius: 50%;
        }

        .download-btn {
            position: absolute;
            top: -25px;
            right: 20px;
            border-radius: 50%;
        }

        body.modal-open .supreme-container {
            -webkit-filter: blur(3px);
            -moz-filter: blur(3px);
            -o-filter: blur(3px);
            -ms-filter: blur(3px);
            filter: blur(3px);
        }
    </style>
@endsection

@section('content_01')
    @if ($errors->any() || session()->has('success'))
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

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#popupModal").modal('show');
            });
        </script>
    @endif

    <main class="container-fluid supreme-container px-0 py-0 h-100 w-100">
        <div class="pt-5">
            <div class="container-fluid d-flex justify-content-center align-items-center w-50">
                <form class="container-fluid d-flex border border-dark-subtle rounded-3 p-1 px-2 pe-0 me-0 w-100">
                    <span class="input-group-text border border-0 bg-transparent"><img
                            src="{{ asset('Icon/home_search.png') }}" width="auto" height="auto"></span>
                    <input class="form-control me-0 pe-0 border border-0 poppins-regular bg-transparent" type="search"
                        aria-label="Search" placeholder="Search for assets">
                </form>
            </div>
        </div>

        <div class="container-fluid h-100 w-100 pt-5">
            <h1 class="poppins-bold text-center" style="font-size: 64px">Find your assets freely!</h1>
            <p class="poppins-regular text-center" style="font-size: 20px">Access a dozen amount of free asset discovery
                tools on our website.</p>
        </div>

        <div class="container-fluid d-flex align-content-center justify-content-center h-100 w-100 pt-5">
            <img class="img-fluid" src="{{ asset('Image/home_banner.png') }}" style="transform: scale(0.90);">
        </div>

        <div class="container-fluid d-flex align-content-center justify-content-center h-100 w-100 pt-5">
            <div class="container text-center">
                <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        <div class="p-3">
                            <img class="img-fluid" src="{{ asset('Logo/home_logo/01.png') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <img class="img-fluid" src="{{ asset('Logo/home_logo/02.png') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <img class="img-fluid" src="{{ asset('Logo/home_logo/03.png') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <img class="img-fluid" src="{{ asset('Logo/home_logo/04.png') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <img class="img-fluid" src="{{ asset('Logo/home_logo/05.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="container-fluid d-flex flex-row align-content-center justify-content-start h-100 w-100 pt-5 ps-5 pb-2 pe-5">
            <ul class="nav pe-0 flex-fill">
                <li class="nav-item flex-fill">
                    <a class="nav-link poppins-regular text-center active" id="selector" href="#"
                        aria-current="page">Trending</a>
                </li>
                <li class="nav-item flex-fill">
                    <a class="nav-link poppins-regular text-center" id="selector" href="#">Most Viewed</a>
                </li>
                <li class="nav-item flex-fill">
                    <a class="nav-link poppins-regular text-center" id="selector" href="#">Most Converted</a>
                </li>
            </ul>

        </div>

        <div
            class="container-fluid d-flex flex-row align-content-center justify-content-start h-100 w-100 px-5 ps-5 pt-3 pb-2">
            <div class="row row-cols-md-4 g-4">
                <!-- 001 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/01.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title fw-medium poppins-regular">Maersk Ship</h5>
                            <p class="card-text poppins-regular" style="color: #AEABAB">Dimas Rifki</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.6</span> <span class="text-secondary">(24
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 002 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/02.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Space Shuttle</h5>
                            <p class="card-text text-secondary">Fitri Handayani</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.2</span> <span class="text-secondary">(32
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 003 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/03.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Ford Model T-1924</h5>
                            <p class="card-text text-secondary">Dufha Arista</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.0</span> <span class="text-secondary">(27
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 004 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/04.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Sci-fi Fighter</h5>
                            <p class="card-text text-secondary">Risma Amaliyah</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">3.8</span> <span class="text-secondary">(20
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 005 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/05.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Beach Seashore</h5>
                            <p class="card-text text-secondary">Haidarrudin Ramdhan</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.1</span> <span class="text-secondary">(30
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 006 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/06.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Lambo Aventador</h5>
                            <p class="card-text text-secondary">Daffa Ferdiansyah</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.5</span> <span class="text-secondary">(23
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 007 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/07.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Rayonier Train</h5>
                            <p class="card-text text-secondary">Daffa Ferdiansyah</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.21</span> <span class="text-secondary">(28
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 008 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/08.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">3D Toolkit</h5>
                            <p class="card-text text-secondary">Fitri Handayani</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">3.92</span> <span class="text-secondary">(35
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 009 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/09.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">3D Toolkit</h5>
                            <p class="card-text text-secondary">Fitri Handayani</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">3.92</span> <span class="text-secondary">(35
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 010 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/10.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Space Shuttle NASA</h5>
                            <p class="card-text text-secondary">Dimas Rifki</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.2</span> <span class="text-secondary">(21
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 011 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/11.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">RL-10 Rocket Engine</h5>
                            <p class="card-text text-secondary">Dufha Arista</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.5</span> <span class="text-secondary">(37
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 012 Card -->
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="customimg card-img-top" src="{{ asset('Image/home_category_example/12.png') }}">
                        <div class="card-body">
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/share.png') }}">
                            </a>
                            {{-- <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a> --}}
                            <h5 class="card-title">Ocean Gate TItan</h5>
                            <p class="card-text text-secondary">Dimas Rifki</p>
                        </div>
                        <div class="card-footer ms-0 ps-0">
                            <div class="container ms-1">
                                <div class="row">
                                    <div class="col justify-content-center align-content-center">
                                        <i class="bi bi-star-fill ps-0 ms-0 pe-1" style="color: #006AFF"></i>
                                        <span class="text-dark text-center">4.7</span> <span class="text-secondary">(49
                                            Review)</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid h-100 w-100 py-5">
            <h1 class="poppins-bold text-center" style="font-size: 64px">Our Research</h1>
            <p class="poppins-regular text-center" style="font-size: 20px">Access a dozen amount of free asset on our
                website.</p>

            <div class="container-fluid px-5">
                <div class="row justify-content-center py-3">
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/001.png') }}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/002.png') }}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/003.png') }}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/004.png') }}">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center py-3">
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/005.png') }}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/006.png') }}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#">
                            <img class="customimg card-img-top" src="{{ asset('Image/home_research_example/007.png') }}">
                        </a>
                    </div>
                </div>
            </div>

        </div>

        @yield('footer')
    </main>
@endsection

@section('topScript')
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
