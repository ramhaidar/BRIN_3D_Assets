@section('subtitle', 'Upload File')

@if (!$role)
    @if ($role == 'Admin')
    @else
        @extends('dashboard.user._user')
    @endif
@endif

@section('customStyle2')
    <style>
        #obj_icon {
            transition: transform .2s;
            /* Animation */
        }

        #obj_icon:hover {
            transform: scale(1.023);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>

    <style>
        .form-control {
            cursor: pointer;
            /* Change cursor to pointer to indicate it's clickable */
        }

        #PrivateCheckbox[disabled] {
            opacity: 1;
            /* Make it fully visible */
            cursor: pointer;
            /* Change cursor to pointer so it looks clickable */
        }
    </style>
@endsection

@section('dashboard_content')

    <div class="container d-flex justify-content-center align-items-center h-100 w-100"
        style="min-height: 100%; background-color: white;">

        {{-- File Information --}}
        <div class="container h-100" id="FileInformation" style="background-color: transparent; ">
            <div class="container h-100">
                <div class="row h-100 py-5 px-5" style="background-color: transparent">
                    <div class="col-12">
                        <h1 class="poppins-bold text-center pb-3">Upload a new Model</h1>

                        <form class="pt-3" id="UploadModel" action="{{ route('upload_the_file') }}" method="POST"
                            autocomplete="off" enctype="multipart/form-data">
                            @CSRF
                            <label class="form-label poppins-regular" for="Name">Nama Model</label>
                            <div class="input-group mb-3 shadow-sm">
                                <span class="input-group-text"><i class="bi bi-file-earmark-font-fill"></i></span>
                                <input class="form-control poppins-regular" id="Name" name="Name" type="name"
                                    value="{{ old('Name') }}" aria-describedby="Name" placeholder="Nama Model" required>
                            </div>

                            <label class="form-label poppins-regular" for="Kategori">Kategori Model</label>
                            <div class="input-group mb-3 shadow-sm">
                                <span class="input-group-text"><i class="bi bi-bookmark-fill"></i></span>

                                <select class="form-select" id="Kategori" name="Kategori" aria-label="Kategori" required>
                                    <option value="1" selected>Kebumian dan Maritim</option>
                                    <option value="2">Elektronika dan Informatika</option>
                                    <option value="3">Teknologi Bersih</option>
                                    <option value="4">Transportasi</option>
                                    <option value="5">Antariksa dan Penerbangan</option>
                                </select>
                            </div>

                            <label class="form-label poppins-regular" for="Filter">Filter Model</label>
                            <div class="input-group mb-3 shadow-sm">
                                <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>

                                <select class="form-select" id="Filter" name="Filter" aria-label="Filter" required>
                                    <option value="1" selected>Avatar</option>
                                    <option value="2">Bangunan</option>
                                    <option value="3">Laboratorium</option>
                                    <option value="4">Peralatan Riset</option>
                                    <option value="5">Prototipe</option>
                                </select>
                            </div>

                            <div class="container px-0 py-0">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label poppins-regular" for="Private">Publikasi Model</label>
                                        <div class="input-group pb-2 text-center" id="ClickToCheck">
                                            <span class="form-control flex-fill poppins-regular px-0 shadow-none"
                                                type="button" style="background-color: #6c757d; color: white">Private
                                                Model</span>
                                            <div class="input-group-text" style="background-color: #6c757d">
                                                <input class="form-check-input mt-0" id="PrivateCheckbox" name="Private"
                                                    type="checkbox" style="pointer-events: none;"
                                                    {{ old('Private') ? 'checked' : '' }}>

                                            </div>
                                        </div>
                                        <sup class="d-flex justify-content-end pt-2 px-0">*Aset tidak akan muncul di
                                            Pencarian dan
                                            Explore</sup>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label class="form-label poppins-regular" for="">Deskripsi
                                            Model</label>
                                        <div class="input-group mb-3 d-flex">
                                            <button class="btn container-fluid" id="TambahDeskripsi" name="TambahDeskripsi"
                                                data-bs-toggle="modal" data-bs-target="#DeskripsiModal" type="button"
                                                style="background-color: #6c757d; color: white;">
                                                Tambah Deskripsi
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <label class="form-label poppins-regular" for="FRealTeksDeskripsiNAMEilter">Deskripsi
                                Model</label>
                            <div class="input-group mb-3 shadow-sm">
                                <textarea class="form-control" id="RealTeksDeskripsiID" name="RealTeksDeskripsiNAME" maxlength="780" rows="4">{!! old('RealTeksDeskripsiNAME') !!}</textarea>
                            </div>

                            <input class="" id="fileInput1" name="file" type="file" style="display: none;"
                                accept=".obj" required />
                        </form>
                    </div>

                    {{-- Unuploaded File --}}
                    <div class="col-12 justify-content-center align-items-center py-3 px-3" id="noUploadYet"
                        style="background-color: white;">
                        <div class="container d-flex justify-content-center align-items-center py-3 px-3 rounded-3"
                            id="filePicker1"
                            style="border-style: dashed; border-color: rgba(80, 80, 80, 0.75); background-color: #FFF7F9FA; max-height: 20vh">
                            <div class="container text-center">
                                <div class="row pb-3">
                                    <div class="col align-self-center">
                                        <a href="#">
                                            <img class="img-fluid" id="obj_icon" src="{{ asset('Icon/obj_icon.png') }}"
                                                style="max-height: 15vh;">
                                        </a>
                                    </div>
                                    <div class="col align-self-center">
                                        <h4>Drag & Drop or <a class="text-decoration-none" href="#"
                                                style="color: #1caad9">Browse</a>
                                        </h4>
                                        <p class="align-content-end justify-content-end align-items-end poppins-regular">
                                            Currently we only support .obj file.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Uploaded File --}}
                    <div class="col-12 justify-content-center align-items-center py-3 px-3" id="correctUpload"
                        style="background-color: transparent; display: none;">
                        <div class="container d-flex justify-content-center align-items-center py-3 px-3 rounded-3"
                            id="filePicker2"
                            style="border-style: dashed; border-color: rgba(80, 80, 80, 0.75); background-color: #FFF7F9FA; max-height: 20vh">
                            <div class="container text-center">
                                <div class="row pb-3">
                                    <div class="col align-self-center">
                                        <img class="img" id="obj_icon" src="{{ asset('Icon/obj_icon.png') }}"
                                            style="max-height: 15vh">
                                    </div>
                                    <div class="col align-self-center">
                                        <div class="container my-3 rounded-3 d-flex justify-content-center align-items-center"
                                            style="background-color: #e8f7fb; min-height: 4vmax; border: 2px #1caad9 solid">
                                            <p class="fs-3 text-center poppins-regular py-0 my-0 d-inline-block text-truncate"
                                                id="fileName" style="max-width: 400px;">File Name
                                            </p>
                                        </div>
                                        <h4 id="DnDoB">Drag & Drop or <a class="text-decoration-none" href="#"
                                                style="color: #1caad9">Browse</a>
                                        </h4>
                                        <p class="align-content-end justify-content-end align-items-end poppins-regular">
                                            Currently we only support .obj file.
                                        </p>
                                        <div class="col align-self-start">
                                            <button class="btn btn-secondary fw-bold poppins-regular" type="button"
                                                style="width: 45%; color: white" onclick="doWhenCancel()">Cancel</button>
                                        </div>
                                    </div>
                                    {{-- <form id="UploadModel" action="" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input class="" id="fileInput1" name="file" type="file"
                                            style="display: none;" accept=".obj" />
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col d-flex justify-content-center align-items-end pb-5">
                        <div class="sticky-bottom d-flex justify-content-center pt-4">
                            {{-- <button class="btn d-flex align-items-center justify-content-center mx-1 customShadow"
                                type="button"
                                style="width: 50px; height: 35px; background-color: #BE3535; color: white;">
                                <i class="bi bi-chevron-left"></i>
                            </button> --}}
                            <button class="btn btn-danger poppins-regular customShadow poppins-regular" form="UploadModel"
                                type="submit"
                                style="width: 120px; height: 50px; font-size: 20px; background-color: #BE3535; color: white;">
                                Upload
                            </button>
                            {{-- <button class="btn d-flex align-items-center justify-content-center mx-1 customShadow"
                                type="button"
                                style="width: 50px; height: 35px; background-color: #BE3535; color: white;">
                                <i class="bi bi-chevron-right"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="fixed-bottom" id="HiddenDIV" style="display: none">

        </div>
    @endsection

    @section('bottomScript')
        <script>
            window.addEventListener('load', function() {
                document.querySelector('#Loader').style.display = 'none';
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#UploadButton").click(function() {
                    $("#UploadModel").submit();
                });
            });
        </script>

        <script>
            let dropContainer1 = document.getElementById('filePicker1');
            let dropContainer2 = document.getElementById('filePicker2');
            let fileInput1 = document.getElementById('fileInput1');

            dropContainer1.ondragover = dropContainer1.ondragenter = function(evt) {
                evt.preventDefault();
            };
            dropContainer2.ondragover = dropContainer2.ondragenter = function(evt) {
                evt.preventDefault();
            };

            dropContainer1.ondrop = function(evt) {

                evt.preventDefault();

                let files = evt.dataTransfer.files;

                let dt = new DataTransfer();

                let invalidFileFound = false;

                for (let i = 0; i < files.length; i++) {

                    if (files[i].name.endsWith('.obj')) {

                        dt.items.add(files[i]);
                    } else {

                        invalidFileFound = true;
                    }
                }

                fileInput1.files = dt.files;

                if (invalidFileFound) {
                    $("#notObjFileModal").modal('show');
                } else {
                    doWhenFileInpute();
                }
            };
        </script>

        <script>
            document.getElementById('filePicker1').addEventListener('click', function() {
                document.getElementById('fileInput1').click();
            });

            function filePicking() {
                document.getElementById('filePicker1').addEventListener('click', function() {
                    document.getElementById('fileInput1').click();
                });
            }
        </script>

        <script>
            document.getElementById('fileInput1').addEventListener('change', function() {
                if (this.files.length > 0) {
                    var fileNameElement = document.getElementById('fileName');
                    fileNameElement.textContent = this.files[0].name;

                    doWhenFileInpute();
                }
            });
        </script>

        <script>
            function doWhenFileInpute() {
                console.log(fileInput1.files[0].name);
                document.getElementById('noUploadYet').style.display = 'none';
                document.getElementById('DnDoB').style.display = 'none';
                document.getElementById('correctUpload').style.display = '';
                document.getElementById("fileName").textContent = fileInput1.files[0].name;
            }

            function doWhenCancel() {
                fileInput1.files = null;

                document.getElementById('noUploadYet').style.display = '';
                document.getElementById('DnDoB').style.display = '';
                document.getElementById('correctUpload').style.display = 'none';
                document.getElementById("fileName").textContent = "File Name";

                $('#fileInput1').val('');
            }
        </script>

        <script>
            function SimpanDeskripsi() {
                document.getElementById('RealTeksDeskripsiID').textContent = document.getElementById('TeksDeskripsiID').value;
            }
        </script>

        <script>
            var inputElement = document.getElementById("ClickToCheck");
            var checkboxElement = document.getElementById("PrivateCheckbox");

            inputElement.addEventListener("click", function() {

                checkboxElement.checked = !checkboxElement.checked;
            });
        </script>

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
            // Import necessary modules from three.js
            import * as THREE from 'three';
            import {
                OBJLoader
            } from 'three/addons/loaders/OBJLoader.js';
            import {
                OrbitControls
            } from 'three/addons/controls/OrbitControls.js';



            // Get the file input element
            let fileInput = document.getElementById('fileInput1');

            let fileSizeOK = true;
            $('#fileInput1').on('change', function() {
                var fileSize = this.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 50) {
                    // alert('File size exceeds 50 MB');
                    $(this).val(''); // Clear the field.
                    fileSizeOK = false;
                    doWhenCancel();

                    // Select the element
                    document.getElementById("customError2Text").textContent = "Max File Size is 50 MB";
                    document.getElementById("customError2").style.display = "block";

                    $(document).ready(function() {
                        $("#popupModal").modal('show');
                    });

                }
            });

            // Add an event listener for when a file is uploaded
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0 && fileSizeOK) {
                    var fileSize = this.files[0].size / 1024 / 1024; // in MB

                    // Create a scene, camera, and renderer
                    let scene = new THREE.Scene();
                    let camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                    let renderer = new THREE.WebGLRenderer();

                    renderer.setSize(1280, 720);

                    renderer.setClearColor(0x5c636a);

                    let dropContainer1 = document.getElementById('HiddenDIV');

                    // document.body.appendChild(renderer.domElement);
                    dropContainer1.appendChild(renderer.domElement);

                    var light = new THREE.AmbientLight(0xffffff);
                    scene.add(light);

                    light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.0);
                    light.position.set(0, 1, 0);
                    scene.add(light);

                    var directionalLight = new THREE.DirectionalLight(0xffeedd);
                    directionalLight.position.set(0, 1, 0).normalize();
                    scene.add(directionalLight);

                    var mesh = null;

                    // Create an OBJLoader instance
                    let loader = new OBJLoader();

                    // Read the file as text
                    let reader = new FileReader();
                    reader.readAsText(this.files[0]);
                    reader.onload = function(event) {
                        // Parse the .obj file
                        let obj = loader.parse(event.target.result);

                        // Add the object to the scene
                        scene.add(obj);

                        let boundingBox = new THREE.Box3().setFromObject(obj);

                        // Get the size of the bounding box
                        let size = boundingBox.getSize(new THREE.Vector3());

                        // Get the center of the bounding box
                        let center = boundingBox.getCenter(new THREE.Vector3());

                        // Adjust camera parameters based on the size of the bounding box
                        camera.position.copy(center);
                        camera.position.x += size.x;
                        camera.position.y += size.y;
                        camera.position.z += size.z;
                        camera.near = 0.1;
                        camera.far = 1000;
                        camera.updateProjectionMatrix();

                        const controls = new OrbitControls(camera, renderer.domElement);
                        controls.target.copy(center);
                        // camera.position.set(0, 20, 100);
                        controls.update();

                        function animate() {
                            requestAnimationFrame(animate);
                            controls.update();
                            renderer.render(scene, camera);
                        }
                        animate();

                        // Get a base64 PNG thumbnail of the canvas content
                        let imgData = renderer.domElement.toDataURL("image/png");

                        // Now you can send imgData to your server...
                        $.ajax({
                            type: "POST",
                            url: "{{ route('thumbnailUpload') }}", // replace with your endpoint
                            data: {
                                _token: "{{ csrf_token() }}",
                                imgData: imgData,
                                username: "{{ Auth::user()->username }}",
                                // include other data if necessary
                            },
                            success: function(response) {
                                console.log(response);
                                // handle success
                            },
                            error: function(error) {
                                console.log(error);
                                // handle error
                            }
                        });

                    };
                }
            });
        </script>
    @endsection
