@section('title', 'Explore')

@extends('app')

@section('customStyle')
    <style>
        html,
        body,
        .container-fluid {
            height: 96%;
        }

        .poppins-custom {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 14px;
        }

        .form-check-input {
            /* Double-sized Checkboxes */
            -ms-transform: scale(0.9);
            /* IE */
            -moz-transform: scale(0.9);
            /* FF */
            -webkit-transform: scale(0.9);
            /* Safari and Chrome */
            -o-transform: scale(0.9);
            /* Opera */
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
    </style>
@endsection

@section('content_01')

    <main class="container-fluid py-0" style="background-color: transparent; ">
        <div class="flex-fill pt-3 px-0 py-0">
            <div class="container-fluid px-0 py-0">

                <div class="container-fluid justify-content-center align-items-center w-75 py-4">
                    <form class="container-fluid d-flex border border-dark-subtle rounded-3 p-1 px-2 pe-0 me-0 w-100">
                        <span class="input-group-text border border-0 bg-transparent"><img
                                src="{{ asset('Icon/home_search.png') }}" width="auto" height="auto"></span>
                        <input class="form-control me-0 pe-0 border border-0 poppins-regular bg-transparent" type="search"
                            aria-label="Search" placeholder="Search for assets">
                    </form>
                </div>

                <div class="row h-100 px-0 py-0" style="background-color: transparent">

                    <div class="col-3 px-5 py-3" style="background-color: transparent">
                        <h4 class="poppins-bold">Categories</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item px-0 py-0">
                                <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center active"
                                    href="#">
                                    <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                    Kebumian dan Maritim
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center" href="#">
                                    <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                    Elektronika dan Informatika
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center" href="#">
                                    <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                    Teknologi Bersih
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center" href="#">
                                    <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                    Transportasi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center" href="#">
                                    <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                    Antariksa dan Penerbangan
                                </a>
                            </li>
                        </ul>

                        <hr class="px-0 py-0" style="border: none; height: 3px; background-color: black;">

                        <h4 class="poppins-bold">Filters</h4>
                        <div class="px-0 py-0 ps-2">
                            <div class="form-check">
                                <input class="form-check-input" id="CheckAvatar" type="checkbox" value="">
                                <label class="form-check-label poppins-custom" for="CheckAvatar"
                                    style="vertical-align: 2px">
                                    Avatar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="CheckBangunan" type="checkbox" value="">
                                <label class="form-check-label poppins-custom" for="CheckBangunan"
                                    style="vertical-align: 2px">
                                    Bangunan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="CheckLaboratorium" type="checkbox" value="">
                                <label class="form-check-label poppins-custom" for="CheckLaboratorium"
                                    style="vertical-align: 2px">
                                    Laboratorium
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="CheckPeralatanRiset" type="checkbox" value="">
                                <label class="form-check-label poppins-custom" for="CheckPeralatanRiset"
                                    style="vertical-align: 2px">
                                    Peralatan Riset
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="CheckPrototipe" type="checkbox" value="">
                                <label class="form-check-label poppins-custom" for="CheckPrototipe"
                                    style="vertical-align: 2px">
                                    Prototipe
                                </label>
                            </div>
                        </div>

                        <hr class="px-0 py-0" style="border: none; height: 3px; background-color: black;">

                        <h4 class="poppins-bold">Sorts</h4>
                        <div class="px-0 py-0 ps-2 d-flex flex-column">
                            <div class="form-check">
                                <input class="form-check-input" id="RadioTerbaru" name="RadioSorts" type="radio" checked>
                                <label class="form-check-label poppins-custom" for="RadioTerbaru"
                                    style="vertical-align: 2px">
                                    Terbaru
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="RadioTerlama" name="RadioSorts" type="radio">
                                <label class="form-check-label poppins-custom" for="RadioTerlama"
                                    style="vertical-align: 2px">
                                    Terlama
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="col px-0 py-0 mx-0 my-0" style="background-color: transparent">
                        <h1 class="px-0 py-0 poppins-bold">Kebumian dan Maritim</h1>

                        <div class="container w-100" style="max-width: 100%">
                            <div class="container-fluid px-0 mx-0 my-4 py-0 pe-3 w-100"
                                style="background-color: transparent">
                                <div class="row row-cols-auto row-cols-lg-4 g-0 g-lg-3 px-0 py-0">
                                    <!-- 001 Card -->
                                    <div class="col">
                                        <div class="card px-0 py-0 shadow-sm rounded-3">
                                            <img class="customimg"
                                                src="{{ asset('Image/home_category_example/01.png') }}">
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
                                                <p class="card-text poppins-regular" style="color: #AEABAB">Dimas Rifki
                                                </p>
                                            </div>
                                            <div class="card-footer ms-0 ps-0">
                                                <div class="container ms-1">
                                                    <div class="row">
                                                        <div class="col justify-content-center align-content-center">
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.6</span> <span
                                                                class="text-secondary">(24
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 002 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/02.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.2</span> <span
                                                                class="text-secondary">(32
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 003 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/03.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.0</span> <span
                                                                class="text-secondary">(27
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 004 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/04.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">3.8</span> <span
                                                                class="text-secondary">(20
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 005 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/05.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.1</span> <span
                                                                class="text-secondary">(30
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 006 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/06.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.5</span> <span
                                                                class="text-secondary">(23
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 007 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/07.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.21</span> <span
                                                                class="text-secondary">(28
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 008 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/08.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">3.92</span> <span
                                                                class="text-secondary">(35 Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 009 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/09.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">3.92</span> <span
                                                                class="text-secondary">(35
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 010 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/10.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.2</span> <span
                                                                class="text-secondary">(21
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 011 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/11.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.5</span> <span
                                                                class="text-secondary">(37
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 012 Card -->
                                    <div class="col">
                                        <div class="card shadow-sm rounded-3">
                                            <img class="customimg card-img-top"
                                                src="{{ asset('Image/home_category_example/12.png') }}">
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
                                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1"
                                                                style="color: #006AFF"></i>
                                                            <span class="text-dark text-center">4.7</span> <span
                                                                class="text-secondary">(49
                                                                Review)</span>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="text-black text-decoration-underline"
                                                                href="#">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 py-0 px-0"></div>

                        <div class="container justify-content-center align-items-center w-100 py-4 mb-4"
                            style="background-color: transparent">
                            <form class="container-fluid d-flex justify-content-center">
                                <button class="btn w-50 rounded-pill shadow-sm poppins-bold"
                                    style="background-color: #F5F5F5;">Load
                                    More</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="container-fluid px-0 py-0">
                </div>

            </div>
        </div>
    </main>

    <div class="container-fluid">
        @extends('footer')
    </div>
@endsection
