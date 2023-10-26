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
            top: -35px;
            right: -10px;
            border-radius: 50%;
        }

        /* Define the styles for the normal state of the button */
        .customButton {
            background-color: transparent;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Define the styles for the button when it's disabled */
        .customButton:disabled {
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
        }

        .model-footer-text {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
        }
    </style>
@endsection

@section('content_01')

    <main class="container px-5 py-0" style="background-color: transparent; min-width: 100%">
        <div class="container-fluid px-0 py-0" style="background-color: transparent">
            <div class="flex-fill pt-3 px-0 py-0">
                <div class="container-fluid px-0 py-0">

                    <div class="container-fluid justify-content-center align-items-center w-75 py-4">
                        <form class="container-fluid d-flex border border-dark-subtle rounded-3 p-1 px-2 pe-0 me-0 w-100">
                            <span class="input-group-text border border-0 bg-transparent"><img
                                    src="{{ asset('Icon/home_search.png') }}" width="auto" height="auto"></span>
                            <input class="form-control me-0 pe-0 border border-0 poppins-regular bg-transparent"
                                id="SearchBox" name="searchTerm" type="search" aria-label="Search"
                                style="text-align: center;" autocomplete="off"
                                placeholder="Search for assets — Type the terms and hit Enter">
                        </form>
                    </div>

                    <div class="row h-100 px-0 py-0" style="background-color: transparent">

                        <div class="col-3 px-5 py-3" style="background-color: transparent">
                            <h4 class="poppins-bold">Categories</h4>
                            <ul class="nav flex-column" id="NavCategories">
                                <li class="nav-item px-0 py-0">
                                    <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center active"
                                        href="#">
                                        <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                        Kebumian dan Maritim
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center"
                                        href="#">
                                        <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                        Elektronika dan Informatika
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center"
                                        href="#">
                                        <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                        Teknologi Bersih
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center"
                                        href="#">
                                        <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                        Transportasi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-0 py-1 ps-2 poppins-custom d-flex align-items-center"
                                        href="#">
                                        <i class="bi bi-circle-fill pe-3" style="font-size: 5px"></i>
                                        Antariksa dan Penerbangan
                                    </a>
                                </li>
                            </ul>

                            <hr class="px-0 py-0" style="border: none; height: 3px; background-color: black;">

                            <h4 class="poppins-bold">Filters</h4>
                            <div class="px-0 py-0 ps-2" id="FormCheckCategories">
                                <div class="form-check">
                                    <input class="form-check-input" id="CheckAvatar" type="checkbox" checked>
                                    <label class="form-check-label poppins-custom" for="CheckAvatar"
                                        style="vertical-align: 2px">
                                        Avatar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="CheckBangunan" type="checkbox" checked>
                                    <label class="form-check-label poppins-custom" for="CheckBangunan"
                                        style="vertical-align: 2px">
                                        Bangunan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="CheckLaboratorium" type="checkbox" checked>
                                    <label class="form-check-label poppins-custom" for="CheckLaboratorium"
                                        style="vertical-align: 2px">
                                        Laboratorium
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="CheckPeralatanRiset" type="checkbox" checked>
                                    <label class="form-check-label poppins-custom" for="CheckPeralatanRiset"
                                        style="vertical-align: 2px">
                                        Peralatan Riset
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="CheckPrototipe" type="checkbox" checked>
                                    <label class="form-check-label poppins-custom" for="CheckPrototipe"
                                        style="vertical-align: 2px">
                                        Prototipe
                                    </label>
                                </div>
                            </div>

                            <hr class="px-0 py-0" style="border: none; height: 3px; background-color: black;">

                            <h4 class="poppins-bold">Sorts</h4>
                            <div class="px-0 py-0 ps-2 d-flex flex-column" id="FormCheckSort">
                                <div class="form-check">
                                    <input class="form-check-input" id="RadioTerbaru" name="RadioSorts" type="radio"
                                        checked>
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
                            <h1 class="px-0 py-0 poppins-bold" id="ActiveCategory">Kebumian dan Maritim</h1>

                            <div class="container px-0 py-0 mx-0 my-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="container w-100 h-75 px-3 py-3"
                                            style="min-height: 38vmax; max-width: 100%">
                                            <div class="container-fluid px-0 mx-0 py-0 w-100"
                                                style="background-color: transparent">
                                                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3" id="ModelContainer"
                                                    style="background-color: transparent">
                                                    <!-- Loop for models will be handled via AJAX -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col w-100">
                                        <hr class="px-0 py-0" style="color: transparent">
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex justify-content-center mb-4">
                                            <button
                                                class="btn d-flex align-items-center justify-content-center mx-1 customShadow"
                                                id="PrevButton" type="button"
                                                style="width: 50px; height: 30px; background-color: #BE3535; color: white;"
                                                disabled>
                                                <i class="bi bi-chevron-left"></i>
                                            </button>

                                            <button
                                                class="btn d-flex align-items-center justify-content-center mx-1 customShadow"
                                                type="button"
                                                style="width: 50px; height: 30px; background-color: #BE3535; color: white;">
                                                <span class="text-center" id="PageIndicator">1</span>
                                            </button>

                                            <button
                                                class="btn d-flex align-items-center justify-content-center mx-1 customShadow"
                                                id="NextButton" type="button"
                                                style="width: 50px; height: 30px; background-color: #BE3535; color: white;"
                                                disabled>
                                                <i class="bi bi-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="container-fluid px-0 py-0">
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            @extends('footer')
        </div>
    </main>
@endsection

@section('bottomScript')
    <script>
        window.addEventListener('load', function() {
            document.querySelector('#Loader').style.display = 'none';
        });
    </script>

    <script>
        let currentPage = 1;
        let currentCategory = $("#NavCategories .nav-item a.active").parent().index() + 1;
        let currentFilters = [];
        $("#FormCheckCategories .form-check-input:checked").each(function() {
            currentFilters.push($(this).parent().index() + 1);
        });
        let currentSort;
        $("#FormCheckSort .form-check-input").each(function(index) {
            if ($(this).is(":checked")) {
                currentSort = index === 0 ? "Terbaru" : "Terlama";
            }
        });
        console.log(currentPage, currentCategory, currentFilters, currentSort);

        let searchMode = false;

        function loadModels(page, category, filters, sort) {
            $.ajax({
                url: '/fetchExploreModel',
                method: 'GET',
                data: {
                    page: page,
                    category: category,
                    filters: filters,
                    sort: sort
                },
                success: function(data) {
                    console.log(page, category, filters, sort);
                    console.log(data);
                    var models = data.models;
                    var nextModels = data.nextModels;
                    console.log('Models:', models);
                    console.log('Likes:', models.likes);
                    var modelsContainer = $('#ModelContainer');
                    if (models.length === 0) {
                        modelsContainer.empty();
                        if (currentPage > 1) {
                            currentPage--;
                            loadModels(currentPage, currentCategory, currentFilters, currentSort);
                            $("#PageIndicator").text(currentPage);
                        }
                        $("#NextButton").attr("disabled", "disabled");
                        return;
                    }
                    if (data.nextModels.length === 0) {
                        $("#NextButton").attr("disabled", "disabled");
                    } else {
                        $("#NextButton").removeAttr("disabled");
                    }
                    modelsContainer.empty();
                    $.each(models, function(index, model) {
                        var modelHtml = `
                            <!-- The Card -->
                            <div class="col">
                                <div class="card px-0 py-0 shadow-sm rounded-3">
                                    <img class="customimg" src="{{ asset('storage/Models/${model.user.username}/${model.sha3_hash}/Thumbnail.png') }}">
                                    <div class="card-body">
                                        <button class="customButton download-btn" onclick="ShareModel('{{ route('model_view') }}/${model.sha3_hash.substring(0, 10)}')" type="button">
                                            <img class="img-fluid customShadow bg-transparent"
                                                src="{{ asset('Icon/home_assets_icon/share.png') }}">
                                        </button>
                                        <h5 class="card-title fw-medium poppins-regular">${model.name}</h5>
                                        <p class="card-text poppins-regular" style="color: #AEABAB">
                                            ${model.user.username}
                                        </p>
                                    </div>
                                    <div class="card-footer ms-0 ps-0">
                                        <div class="container ms-1">
                                            <div class="row d-flex justify-content-start align-content-center">
                                                <div class="col-2 ms-3 px-0 py-0 mx-0 my-0">
                                                    <i class="bi bi-hand-thumbs-up ps-0 ms-0 pe-1 model-footer-text"></i>
                                                    <span class="text-dark text-center model-footer-text">${model.likes.length}</span>
                                                </div>
                                                <div class="col-2 px-0 py-0 mx-0 my-0">
                                                    <i class="bi bi-eye ps-0 ms-0 pe-1 model-footer-text"></i>
                                                    <span class="text-secondary model-footer-text">${model.view_count}</span>
                                                </div>
                                                <div class="col-2 px-0 py-0 mx-0 my-0">
                                                    <i class="bi bi-cloud-arrow-down ps-0 ms-0 pe-1 model-footer-text"></i>
                                                    <span class="text-secondary model-footer-text">${model.downloads.length}</span>
                                                </div>
                                                <div class="col text-end">
                                                    <a class="text-black text-decoration-underline model-footer-text"
                                                        href="/model/${model.sha3_hash}">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        modelsContainer.append(modelHtml);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        loadModels(currentPage, currentCategory, currentFilters, currentSort);

        $("#NavCategories .nav-item a").click(function() {
            currentPage = 1;
            $("#PrevButton").attr("disabled", "disabled");
            $("#NextButton").attr("disabled", "disabled");
            $("#NavCategories .nav-item a.active").removeClass("active");
            $(this).addClass("active");
            currentCategory = $(this).parent().index() + 1;
            let activeCategoryText = $(this).text();
            $("#ActiveCategory").text(activeCategoryText);

            if (searchMode) {
                searchModels(currentPage, searchTerm, currentCategory, currentFilters, currentSort);

            } else {
                loadModels(currentPage, currentCategory, currentFilters, currentSort);
            }

            $("#PageIndicator").text(currentPage);
        });

        $("#FormCheckCategories .form-check-input").click(function() {
            currentPage = 1;
            currentFilters = [];
            $("#FormCheckCategories .form-check-input:checked").each(function() {
                currentFilters.push($(this).parent().index() + 1);
            });

            if (searchMode) {
                searchModels(currentPage, searchTerm, currentCategory, currentFilters, currentSort);

            } else {
                loadModels(currentPage, currentCategory, currentFilters, currentSort);
            }

            $("#PageIndicator").text(currentPage);
        });

        $("#FormCheckSort .form-check-input").click(function() {
            currentPage = 1;
            let index = $(this).parent().index();
            currentSort = index === 0 ? "Terbaru" : "Terlama";

            if (searchMode) {
                searchModels(currentPage, searchTerm, currentCategory, currentFilters, currentSort);

            } else {
                loadModels(currentPage, currentCategory, currentFilters, currentSort);
            }

            $("#PageIndicator").text(currentPage);
        });

        $('#NextButton').on('click', function(event) {
            event.preventDefault();
            currentPage++;

            if (searchMode) {
                searchModels(currentPage, searchTerm, currentCategory, currentFilters, currentSort);

            } else {
                loadModels(currentPage, currentCategory, currentFilters, currentSort);
            }

            $("#PageIndicator").text(currentPage);
            $("#PrevButton").removeAttr("disabled");
        });

        $('#PrevButton').on('click', function(event) {
            if (currentPage > 1) {
                event.preventDefault();
                currentPage--;

                if (searchMode) {
                    searchModels(currentPage, searchTerm, currentCategory, currentFilters, currentSort);

                } else {
                    loadModels(currentPage, currentCategory, currentFilters, currentSort);
                }

                $("#PageIndicator").text(currentPage);
                if (currentPage === 1) {
                    $("#PrevButton").attr("disabled", "disabled");
                    $("#NextButton").removeAttr("disabled");
                }
            }
        });

        function ShareModel(sha3_hash) {
            $("#shareModal").modal('show');
            var shareLinkElement = document.getElementById("shareLink");
            if (shareLinkElement) {
                shareLinkElement.textContent = (sha3_hash);
            }
        }

        document.getElementById("shareLink").addEventListener("click", function() {
            navigator.clipboard.writeText(document.getElementById("shareLink").textContent);
        });

        function searchModels(page, searchTerm, category, filters, sort) {
            console.log(page, searchTerm, category, filters, sort);

            $.ajax({
                url: '/searchModelsExplore',
                method: 'GET',
                data: {
                    page: page,
                    searchTerm: searchTerm,
                    category: category,
                    filters: filters,
                    sort: sort
                },
                success: function(data) {
                    console.log(data);
                    var models = data.models;
                    var nextExists = data.nextExists;
                    console.log('Models:', models);

                    // console.log(page, searchTerm, category, filters, sort);

                    var modelsContainer = $('#ModelContainer');
                    if (models.length === 0) {
                        modelsContainer.empty();
                        if (currentPage > 1) {
                            currentPage--;
                            searchModels(currentPage, currentSearchTerm);
                            $("#PageIndicator").text(currentPage);
                        }
                        $("#NextButton").attr("disabled", "disabled");
                        return;
                    }
                    if (!nextExists) {
                        $("#NextButton").attr("disabled", "disabled");
                    } else {
                        $("#NextButton").removeAttr("disabled");
                    }
                    modelsContainer.empty();
                    $.each(models, function(index, model) {
                        var modelHtml = `
                            <!-- The Card -->
                            <div class="col">
                                <div class="card px-0 py-0 shadow-sm rounded-3">
                                    <img class="customimg" src="{{ asset('storage/Models/${model.user.username}/${model.sha3_hash}/Thumbnail.png') }}">
                                    <div class="card-body">
                                        <button class="customButton download-btn" onclick="ShareModel('{{ route('model_view') }}/${model.sha3_hash.substring(0, 10)}')" type="button">
                                            <img class="img-fluid customShadow bg-transparent"
                                                src="{{ asset('Icon/home_assets_icon/share.png') }}">
                                        </button>
                                        <h5 class="card-title fw-medium poppins-regular">${model.name}</h5>
                                        <p class="card-text poppins-regular" style="color: #AEABAB">
                                            ${model.user.username}
                                        </p>
                                    </div>
                                    <div class="card-footer ms-0 ps-0">
                                        <div class="container ms-1">
                                            <div class="row d-flex justify-content-start align-content-center">
                                                <div class="col-2 ms-3 px-0 py-0 mx-0 my-0">
                                                    <i class="bi bi-hand-thumbs-up ps-0 ms-0 pe-1 model-footer-text"></i>
                                                    <span class="text-dark text-center model-footer-text">${model.likes.length}</span>
                                                </div>
                                                <div class="col-2 px-0 py-0 mx-0 my-0">
                                                    <i class="bi bi-eye ps-0 ms-0 pe-1 model-footer-text"></i>
                                                    <span class="text-secondary model-footer-text">${model.view_count}</span>
                                                </div>
                                                <div class="col-2 px-0 py-0 mx-0 my-0">
                                                    <i class="bi bi-cloud-arrow-down ps-0 ms-0 pe-1 model-footer-text"></i>
                                                    <span class="text-secondary model-footer-text">${model.downloads.length}</span>
                                                </div>
                                                <div class="col text-end">
                                                    <a class="text-black text-decoration-underline model-footer-text"
                                                        href="/model/${model.sha3_hash}">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        modelsContainer.append(modelHtml);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        var searchTerm = "";

        $('#SearchBox').on('input', function(e) {
            if ($(this).val().trim() === '') { // Check if search term is empty
                $("#NextButton").removeAttr("disabled");
                $("#ModelContainer").empty();
                searchTerm = '';
                searchMode = false;
                loadModels(1, currentCategory, currentFilters, currentSort);
                $("#PageIndicator").text(1);
                $("#PrevButton").attr("disabled", "disabled");
            }
        }).on('keypress', function(e) {
            if (e.which == 13) { // 13 is the Enter key
                e.preventDefault(); // Prevent form submission
                searchTerm = $(this).val();
                if (searchTerm.trim() !== '') { // Check if search term is not empty
                    $("#NextButton").removeAttr("disabled");
                    $("#ModelContainer").empty();
                    searchMode = true;
                    searchModels(1, searchTerm, currentCategory, currentFilters, currentSort);
                    $("#PageIndicator").text(1);
                    $("#PrevButton").attr("disabled", "disabled");
                }
            }
        });
    </script>

@endsection
