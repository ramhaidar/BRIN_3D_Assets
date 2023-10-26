@section('title', 'Model View')

@extends('app')

@section('customStyle')
    <style>
        html,
        body,
        .container-fluid {
            height: 96%;
        }

        .customimg2 {
            width: 47.5%;
            object-fit: cover;
            aspect-ratio: 1/1;
        }

        .customimg3 {
            object-fit: cover;
            aspect-ratio: 1/1;
        }
    </style>
@endsection

@section('content_01')

    <main class="container py-0 px-0" style="background-color: transparent; max-width: 100%;">
        <div class="container-fluid px-0 py-0 pt-3" style="background-color: transparent">
            <div class="container-fluid d-flex pt-4 px-0 py-0 text-center" style="background-color: transparent">
                <div class="row w-100 px-0 py-0 mx-0 my-0">
                    <div class="col" style="background-color: transparent">
                        <div class="row d-flex align-items-center">
                            <div class="col text-start ps-5 ms-5" style="background-color: transparent">
                                <a class="text-decoration-none" href="{{ route('explore') }}">
                                    <i class="bi bi-arrow-left" style="color: black; font-size: 35px"></i>
                                </a>
                            </div>
                            <div class="col text-end pe-5 me-5" style="background-color: transparent">
                                <a class="text-decoration-none">
                                    <span class="poppins-bold" style="color: black; font-size: 35px">01 </span>
                                    <span class="poppins-bold text-body-tertiary" style="color: black; font-size: 35px">/
                                        04</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="px-0 py-1 w-100"></div>

                    <div class="col px-5 mx-5" style="background-color: transparent">
                        <div class="row d-flex">
                            <div class="col-4 me-3 text-start" style="background-color: transparent">
                                <div class="row h-100 d-flex align-content-around" style="background-color: transparent">
                                    <div class="col">
                                        <a class="text-decoration-none">
                                            <nav aria-label="breadcrumb " style="--bs-breadcrumb-divider: '/';">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item text-decoration-none poppins-regular"><a
                                                            href="{{ route('explore') }}"
                                                            style="color: #323334; opacity: 40%">Explore</a></li>
                                                    <li class="breadcrumb-item active poppins-regular" aria-current="page">
                                                        Kebumian
                                                        dan Maritim</li>
                                                </ol>
                                            </nav>
                                        </a>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div class="pt-4">
                                            <h1 class="poppins-bold">F-15 Eagle Fighter</h1>
                                            <span class="poppins-regular">
                                                <i class="bi bi-star-fill" style="color: #FFC41F"></i>
                                                <i class="bi bi-star-fill" style="color: #FFC41F"></i>
                                                <i class="bi bi-star-fill" style="color: #FFC41F"></i>
                                                <i class="bi bi-star-fill" style="color: #FFC41F"></i>
                                                <i class="bi bi-star-half" style="color: #FFC41F"></i>
                                                <span class="ps-1">4.6 / 5.0</span>
                                                <span class="ps-1 text-body-tertiary">(556)</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div>
                                            <span class="poppins-regular pt-5" style="text-align: justify">
                                                A perfect addition to your aeronautic scenes with 3D detailed F-15 Fighter
                                                Jet.
                                                This
                                                meticulously crafted 3D model captures the essence of a serene aeronautic
                                                setting.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div class="d-grid gap-2 py-3">
                                            <button class="btn btn-danger poppins-bold shadow-sm" type="submit"
                                                style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem;">
                                                Download
                                            </button>
                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div class="py-2">
                                            <span class="poppins-regular" style="text-align: justify">Free Asset • Offered
                                                Through BRIN • 3D Assets</span>
                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div class="pt-3">
                                            <a class="poppins-bold text-decoration-none" href="{{ route('signin') }}"
                                                style="text-align: justify">
                                                <span style="color: #BE3535; font-size: 20px;">
                                                    <i class="bi bi-heart"></i>
                                                    <span class="ps-2">Add to Favorites</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col text-center" style="background-color: transparent">
                                <div class="container">
                                    <div class="carousel slide carousel-fade" id="carouselExampleFade">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="img-fluid customimg2"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 01.png') }}"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid customimg2"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 02.png') }}"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid customimg2"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 03.png') }}"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid customimg2"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 04.png') }}"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" data-bs-target="#carouselExampleFade"
                                            data-bs-slide="prev" type="button">
                                            <i class="bi bi-chevron-left" style="color: black; font-size: 35px"></i>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" data-bs-target="#carouselExampleFade"
                                            data-bs-slide="next" type="button">
                                            <i class="bi bi-chevron-right" style="color: black; font-size: 35px"></i>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-2 text-center" style="max-width: 12.5%">
                                                <img class="img-fluid customimg3 rounded-3 border border-2 border-danger"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 01.png') }}">
                                            </div>
                                            <div class="col-2 text-center" style="max-width: 12.5%">
                                                <img class="img-fluid customimg3 rounded-3 border border-2 border-secondary-subtle"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 02.png') }}">
                                            </div>
                                            <div class="col-2 text-center" style="max-width: 12.5%">
                                                <img class="img-fluid customimg3 rounded-3 border border-2 border-secondary-subtle"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 03.png') }}">
                                            </div>
                                            <div class="col-2 text-center" style="max-width: 12.5%">
                                                <img class="img-fluid customimg3 rounded-3 border border-2 border-secondary-subtle"
                                                    src="{{ asset('Image/model_view_example/Penampakan Gambar 04.png') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
