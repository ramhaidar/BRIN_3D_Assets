@section('title', 'Home')

@extends('app')

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
    </style>
@endsection

@section('content_01')
    <main class="container-fluid h-100 w-100">
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
            <h1 class="poppins-bold text-center" style="font-size: 64px">Find your assets freely !</h1>
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
                    <a class="nav-link poppins-regular text-center" id="selector" href="#">Most Download</a>
                </li>
            </ul>
            <div class="container ps-0 flex-fill" id="underlineBG"></div>
        </div>

        <div
            class="container-fluid d-flex flex-row align-content-center justify-content-start h-100 w-100 pt-5 ps-5 pb-2 pe-5">
            <div class="row row-cols-md-4 g-4">
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="card-img-top" src="{{ asset('Image/home_asset_example/01.png') }}">
                        <div class="card-body">
                            <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a>
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/download.png') }}">
                            </a>
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
                                    <div class="col-6 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="card-img-top" src="{{ asset('Image/home_asset_example/02.png') }}">
                        <div class="card-body">
                            <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a>
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/download.png') }}">
                            </a>
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
                                    <div class="col-6 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="card-img-top" src="{{ asset('Image/home_asset_example/03.png') }}">
                        <div class="card-body">
                            <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a>
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/download.png') }}">
                            </a>
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
                                    <div class="col-6 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <img class="card-img-top" src="{{ asset('Image/home_asset_example/04.png') }}">
                        <div class="card-body">
                            <a class="fav-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/fav.png') }}">
                            </a>
                            <a class="download-btn" href="#">
                                <img class="img-fluid customShadow bg-transparent"
                                    src="{{ asset('Icon/home_assets_icon/download.png') }}">
                            </a>
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
                                    <div class="col-6 text-end">
                                        <a class="text-black text-decoration-underline" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" role="img" aria-label="Placeholder: Thumbnail"
                            width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">View</button>
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Edit</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" role="img" aria-label="Placeholder: Thumbnail"
                            width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">View</button>
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Edit</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" role="img" aria-label="Placeholder: Thumbnail"
                            width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">View</button>
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Edit</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" role="img" aria-label="Placeholder: Thumbnail"
                            width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">View</button>
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Edit</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" role="img" aria-label="Placeholder: Thumbnail"
                            width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">View</button>
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Edit</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
