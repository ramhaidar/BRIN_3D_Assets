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

        .custom-truncate {
            /* text-anchor: start; */
            text-align: justify;
            white-space: normal;
            /* Prevent text from wrapping */
            overflow: hidden;
            /* Hide any overflowing text */
            text-overflow: ellipsis;
            /* Display an ellipsis (...) when text overflows */
            width: 28vmax;
            max-height: 15vmax;
            height: auto;
            /* Set a fixed width for the container, adjust as needed */
        }
    </style>
@endsection

@section('topScript')
    <script>
        $(document).ready(function() {
            document.querySelector('#Loader').style.display = 'block';
        });
    </script>
@endsection

@section('content_01')

    @if ($errors->any() || session()->has('success') || session()->has('customError'))
        <script>
            $(document).ready(function() {
                $("#popupModal").modal('show');
            });
        </script>
    @endif

    {{-- @if (session()->has('model'))
        <div class="alert alert-success">
            <ul class="pt-2">
                @foreach (session()->get('model') as $model)
                    <li>{{ $model }}</li>
                    <li>{{ $model->id }}</li>
                    <li>{{ $model->file_path }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    {{-- @if ($model)
        <div class="alert alert-success">
            <ul class="pt-2">
                @foreach ($model as $model)
                    <li>{{ $model }}</li>
                    <li>{{ $model->id }}</li>
                    <li>{{ $model->file_path }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <main class="container py-0 px-0" style="background-color: transparent; max-width: 100%;">
        <div class="container-fluid px-0 py-0 pt-3" style="background-color: transparent">
            <div class="container-fluid d-flex pt-4 px-0 py-0 text-center" style="background-color: transparent">
                <div class="row w-100 px-0 py-0 mx-0 my-0">
                    <div class="col" style="background-color: transparent">
                        <div class="row d-flex align-items-center">
                            <div class="col text-start ps-5 ms-5" style="background-color: transparent">
                                <a class="text-decoration-none" href="{{ url()->previous() }}">
                                    <i class="bi bi-arrow-left" style="color: black; font-size: 35px"></i>
                                </a>
                            </div>
                            {{-- <div class="col text-end pe-5 me-5" style="background-color: transparent">
                                <a class="text-decoration-none">
                                    <span class="poppins-bold" style="color: black; font-size: 35px">01 </span>
                                    <span class="poppins-bold text-body-tertiary" style="color: black; font-size: 35px">/
                                        04</span>
                                </a>
                            </div> --}}
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
                                                        {{ $model->category->name }}</li>
                                                </ol>
                                            </nav>
                                        </a>
                                    </div>

                                    <div class="px-0 w-100"></div>

                                    <div class="col">
                                        <div class="pb-2">
                                            <div class="row w-100 px-0 py-0 mx-0 my-0 pb-2"
                                                style="background-color: transparent">
                                                <div class="col px-0 py-0 mx-0 my-0">
                                                    <h1 class="poppins-bold px-0 py-0 mx-0 my-0 text-truncate">
                                                        {{ $model->name }}</h1>
                                                </div>
                                                <div
                                                    class="col px-0 py-0 mx-0 my-0 d-flex justify-content-end align-items-center">
                                                    @if ($model->private == 1)
                                                        <i class="bi bi-lock-fill px-0 py-0 mx-0 my-0"
                                                            style="font-size: 150%"></i>
                                                    @else
                                                        <i class="bi bi-unlock-fill px-0 py-0 mx-0 my-0"
                                                            style="font-size: 150%"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row align-items-start h-100 d-flex align-content-center">
                                                    <div class="col px-0 py-0 mx-0 my-0 rounded-2 text-start">
                                                        <span class="poppins-regular text-decoration-none" href=""
                                                            style="font-size: 17.5px">By
                                                            {{ '@' . $model->user->username }}</span>
                                                    </div>
                                                    {{-- <a class="col-2 px-0 py-0 mx-1 my-0 rounded-2 border border-secondary text-secondary text-center text-decoration-none"
                                                        id="star-div" href="#">
                                                        <i class="bi bi bi-hand-thumbs-up" id="star-icon" style="font-size: 15px"></i>
                                                        <span class="ps-1 poppins-regular"
                                                            style="font-size: 15px">{{ $model->like_count }}</span>
                                                    </a> --}}

                                                    <a class="col-2 px-0 py-0 mx-1 my-0 rounded-2 border border-secondary text-secondary text-center text-decoration-none"
                                                        id="star-div" data-model-id="{{ $model->id }}"
                                                        @auth href="#" @endauth>
                                                        <i class="{{ $liked ? 'bi bi-hand-thumbs-up-fill' : 'bi bi-hand-thumbs-up' }}"
                                                            id="star-icon" style="font-size: 15px"></i>
                                                        <span class="ps-1 poppins-regular"
                                                            style="font-size: 15px">{{ $model->likes->count() }}</span>
                                                    </a>

                                                    <div class="col-2 px-0 py-0 mx-1 my-0 rounded-2 border border-secondary text-secondary text-center text-decoration-none"
                                                        id="eye-div" href="#">
                                                        <i class="bi bi-eye" id="eye-icon" style="font-size: 15px"></i>
                                                        <span class="ps-1 poppins-regular"
                                                            style="font-size: 15px">{{ $model->view_count }}</span>
                                                    </div>

                                                    <div class="col-2 px-0 py-0 mx-1 my-0 rounded-2 border border-secondary text-secondary text-center text-decoration-none"
                                                        id="download-div" href="#">
                                                        <i class="bi bi-cloud-arrow-down" id="download-icon"
                                                            style="font-size: 15px"></i>
                                                        <span class="ps-1 poppins-regular"
                                                            style="font-size: 15px">{{ $model->downloads->count() }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div class="container px-0 py-0 custom-truncate">
                                            <span class="poppins-regular pt-5" style="text-align: justify">
                                                {{ $model->description }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    {{-- <div class="col">
                                        <div class="d-grid gap-2 py-3">
                                            <button class="btn btn-danger poppins-bold shadow-sm" type="submit"
                                                style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem;">
                                                Download
                                            </button>
                                        </div>
                                    </div> --}}

                                    <form method="POST" action="{{ route('downloadModel') }}">
                                        @csrf
                                        <input name="model_id" type="hidden" value="{{ $model->id }}">
                                        <div class="col">
                                            <div class="d-grid gap-2 py-3">
                                                <button class="btn btn-danger poppins-bold shadow-sm" type="submit"
                                                    style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem;">
                                                    Download
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="px-0 py-1 w-100"></div>

                                    <div class="col">
                                        <div class="py-2">
                                            <span class="poppins-regular" style="text-align: justify">Free Asset • Offered
                                                Through BRIN • 3D Assets</span>
                                        </div>
                                    </div>

                                    <div class="px-0 py-1 w-100"></div>

                                    {{-- <div class="col">
                                        <div class="pt-3">
                                            <form action="{{ route('addFavorite', ['id' => $model->id]) }}" method="POST">
                                                @csrf
                                                <button class="poppins-bold text-decoration-none" type="submit"
                                                    style="text-align: justify">
                                                    <span style="color: #BE3535; font-size: 20px;">
                                                        <i class="bi bi-heart"></i>
                                                        <span class="ps-2">Add to Favorites</span>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col">
                                        <div class="pt-3">
                                            @if (auth()->check() &&
    auth()->user()->favorites->contains('model_id', $model->id))
                                                <form class=""
                                                    action="{{ route('removeFavorite', ['id' => $model->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn poppins-bold text-decoration-none" type="submit"
                                                        style="text-align: justify">
                                                        <span style="color: #BE3535; font-size: 20px;">
                                                            <i class="bi bi-heart-fill"></i>
                                                            <span class="ps-2">Remove from Favorites</span>
                                                        </span>
                                                    </button>
                                                </form>
                                            @else
                                                <form clas=""
                                                    action="{{ route('addFavorite', ['id' => $model->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn poppins-bold text-decoration-none" type="submit"
                                                        style="text-align: justify">
                                                        <span style="color: #BE3535; font-size: 20px;">
                                                            <i class="bi bi-heart"></i>
                                                            <span class="ps-2">Add to Favorites</span>
                                                        </span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col">
                                        <div class="pt-3">
                                            @if (auth()->check() &&
    auth()->user()->favorites->contains('model_id', $model->id))
                                                <button class="btn poppins-bold text-decoration-none" id="remove-favorite"
                                                    data-model-id="{{ $model->id }}" style="text-align: justify">
                                                    <span style="color: #BE3535; font-size: 20px;">
                                                        <i class="bi bi-heart-fill" id="ButtonIcon"></i>
                                                        <span class="ps-2" id="ButtonText">Remove from Favorites</span>
                                                    </span>
                                                </button>
                                            @else
                                                <button class="btn poppins-bold text-decoration-none" id="add-favorite"
                                                    data-model-id="{{ $model->id }}" style="text-align: justify">
                                                    <span style="color: #BE3535; font-size: 20px;">
                                                        <i class="bi bi-heart" id="ButtonIcon"></i>
                                                        <span class="ps-2" id="ButtonText">Add to Favorites</span>
                                                    </span>
                                                </button>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col">
                                        <div class="pt-3">

                                            <div class="px-0 py-0" id="AddFAVButtonDIV"
                                                style="display: {{ auth()->check() &&auth()->user()->favorites->contains('model_id', $model->id)? 'none': 'block' }}">
                                                <button class="btn poppins-bold text-decoration-none" id="add-favorite"
                                                    data-model-id="{{ $model->id }}" style="text-align: justify">
                                                    <span style="color: #BE3535; font-size: 20px;">
                                                        <i class="bi bi-heart" id="ButtonIcon"></i>
                                                        <span class="ps-2" id="ButtonText">Add to Favorites</span>
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="px-0 py-0" id="RemoveFAVButtonDIV"
                                                style="display: {{ auth()->check() &&auth()->user()->favorites->contains('model_id', $model->id)? 'block': 'none' }}">
                                                <button class="btn poppins-bold text-decoration-none" id="remove-favorite"
                                                    data-model-id="{{ $model->id }}" style="text-align: justify;">
                                                    <span style="color: #BE3535; font-size: 20px;">
                                                        <i class="bi bi-heart-fill" id="ButtonIcon"></i>
                                                        <span class="ps-2" id="ButtonText">Remove from Favorites</span>
                                                    </span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col ps-3" style="background-color: transparent">
                                <div class="container py-0 w-100 h-100" style="background-color: transparent">
                                    <div class="container px-0 py-0" id="ModelViewer"
                                        style="background-color: black; width: 50vmax; height: 35vmax;">
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

@section('bottomScript')
    <script async src="https://unpkg.com/es-module-shims@1.8.0/dist/es-module-shims.js"></script>

    <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@0.156.1/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@0.156.1/examples/jsm/"
        }
    }
    </script>

    <script type="module">
        import * as THREE from 'three';
        import {
            OBJLoader
        } from 'three/addons/loaders/OBJLoader.js';
        import {
            OrbitControls
        } from 'three/addons/controls/OrbitControls.js';

        const container = document.querySelector('#ModelViewer');
        let containerWidth = container.offsetWidth;
        let containerHeight = container.offsetHeight;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, containerWidth / containerHeight, 0.1, 1000);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(containerWidth, containerHeight);
        renderer.setClearColor(0x5c636a);
        container.appendChild(renderer.domElement);

        var light = new THREE.AmbientLight(0xffffff);
        scene.add(light);

        light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.0);
        light.position.set(0, 1, 0);
        scene.add(light);

        var directionalLight = new THREE.DirectionalLight(0xffeedd);
        directionalLight.position.set(0, 1, 0).normalize();
        scene.add(directionalLight);

        var mesh = null;

        const loader = new OBJLoader();

        let path = ("/storage/" +
            "{{ $model->file_path }}");

        loader.load(

            path,

            function(object) {

                scene.add(object);

                let boundingBox = new THREE.Box3().setFromObject(object);

                let size = boundingBox.getSize(new THREE.Vector3());

                let center = boundingBox.getCenter(new THREE.Vector3());

                camera.position.copy(center);
                camera.position.x += size.x;
                camera.position.y += size.y;
                camera.position.z += size.z;
                camera.near = 0.1;
                camera.far = 1000;
                camera.updateProjectionMatrix();

                document.querySelector('#Loader').style.display = 'none';
            },

            function(xhr) {
                console.log((xhr.loaded / xhr.total * 100) + '% loaded');
            },

            function(error) {
                console.log('An error happened');
            },
        );

        const controls = new OrbitControls(camera, renderer.domElement);
        camera.position.set(0, 20, 100);
        controls.update();

        function onWindowResize() {
            const newContainerWidth = container.offsetWidth;
            const newContainerHeight = container.offsetHeight;

            if (newContainerWidth !== containerWidth || newContainerHeight !== containerHeight) {
                containerWidth = newContainerWidth;
                containerHeight = newContainerHeight;

                camera.aspect = containerWidth / containerHeight;
                camera.updateProjectionMatrix();

                renderer.setSize(containerWidth, containerHeight);
            }
        }

        window.addEventListener('resize', onWindowResize);

        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        animate();
    </script>

    <script>
        $(document).ready(function() {

            $("#add-favorite").click(function() {
                var modelId = $(this).data("model-id");
                var button = $(this);

                console.log(modelId);

                $.ajax({
                    type: "POST",
                    url: "{{ route('addFavorite', ['id' => $model->id]) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        document.getElementById("AddFAVButtonDIV").style.display = "none";
                        document.getElementById("RemoveFAVButtonDIV").style.display = "block";
                    }
                });
            });

            $("#remove-favorite").click(function() {
                var modelId = $(this).data("model-id");
                var button = $(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('removeFavorite', ['id' => $model->id]) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        document.getElementById("AddFAVButtonDIV").style.display = "block";
                        document.getElementById("RemoveFAVButtonDIV").style.display = "none";
                    }
                });
            });
        });
    </script>

    @auth
        <script>
            $(document).ready(function() {
                $("#star-div").hover(function() {
                    var starIcon = $(this).find("#star-icon");
                    if (starIcon.hasClass("bi bi-hand-thumbs-up-fill")) {
                        starIcon.removeClass("bi bi-hand-thumbs-up-fill");
                        starIcon.addClass("bi bi-hand-thumbs-up");
                    } else {
                        starIcon.removeClass("bi bi-hand-thumbs-up");
                        starIcon.addClass("bi bi-hand-thumbs-up-fill");
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#star-div").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('toggleLike', ['id' => $model->id]) }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            console.log("AJAX success:", data);
                            if (data.liked) {
                                console.log("Model liked");
                                $("#star-icon").removeClass("bi bi-hand-thumbs-up").addClass(
                                    "bi bi-hand-thumbs-up-fill");
                            } else {
                                console.log("Model unliked");
                                $("#star-icon").removeClass("bi bi-hand-thumbs-up-fill").addClass(
                                    "bi bi-hand-thumbs-up");
                            }
                            $("#star-div span").text(data.like_count);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error("AJAX error:", textStatus, errorThrown);
                        }
                    });
                });
            });
        </script>
    @endauth

@endsection
