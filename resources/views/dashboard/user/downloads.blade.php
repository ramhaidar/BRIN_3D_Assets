@section('subtitle', 'Downloads')

@extends('dashboard.user._user')

@section('customStyle2')
    <style>
        #circleButton {
            width: 1.5vmax;
            height: 1.5vmax;
            padding: 0.3vmax 0px;
            border-radius: 0.75vmax;
            text-align: center;
        }

        .card-body {
            position: relative;
        }

        .fav-btn {
            position: absolute;
            top: -1.25vmax;
            right: 4vmax;
            border-radius: 50%;
        }

        .download-btn {
            position: absolute;
            top: -1.75vmax;
            right: 1vmax;
            border-radius: 50%;
        }

        .model-footer-text {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
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
    </style>
@endsection

@section('dashboard_content')
    <div class="container px-0 py-0 mx-0 my-0">
        <div class="row">

            <div class="col-12">
                <div class="container w-100 h-75 px-3 py-3" style="min-height: 38vmax; max-width: 100%">
                    <div class="container-fluid px-0 mx-0 py-0 w-100" style="background-color: transparent">
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
                <div class="sticky-bottom d-flex justify-content-center pt-4">
                    <button class="btn d-flex align-items-center justify-content-center mx-1 customShadow" id="PrevButton"
                        type="button" style="width: 50px; height: 30px; background-color: #BE3535; color: white;" disabled>
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <button class="btn d-flex align-items-center justify-content-center mx-1 customShadow" type="button"
                        style="width: 50px; height: 30px; background-color: #BE3535; color: white;">
                        <span class="text-center" id="PageIndicator">1</span>
                    </button>

                    <button class="btn d-flex align-items-center justify-content-center mx-1 customShadow" id="NextButton"
                        type="button" style="width: 50px; height: 30px; background-color: #BE3535; color: white;" disabled>
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection()

@section('bottomScript')
    <script>
        window.addEventListener('load', function() {
            document.querySelector('#Loader').style.display = 'none';
        });
    </script>

    <script>
        $(document).ready(function() {
            let currentPage = 1;

            function loadModels(page) {
                $.ajax({
                    url: '/fetchDownloadModels?page=' + page,
                    method: 'GET',
                    success: function(data) {
                        var models = data.models;
                        var nextExists = data.nextExists;

                        var modelsContainer = $('#ModelContainer');

                        if (models.length === 0) {
                            modelsContainer.empty();

                            if (currentPage > 1) {
                                currentPage--;
                                loadModels(currentPage);
                                $("#PageIndicator").text(currentPage);
                            }

                            $("#NextButton").attr("disabled", "disabled");

                            return;
                        }

                        if (data.nextExists === false) {
                            $("#NextButton").attr("disabled", "disabled");
                        } else {
                            $("#NextButton").removeAttr("disabled");
                        }

                        // Clear existing content before appending new models
                        modelsContainer.empty();

                        // Loop through the models and append them to the container
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
                                    <div class="row d-flex">
                                        <div class="col justify-content-center align-content-center">
                                            <i class="bi bi-star-fill ps-0 ms-0 pe-1 model-footer-text"
                                                style="color: #006AFF;"></i>
                                            <span class="text-dark text-center model-footer-text">4.6</span>
                                            <span class="text-secondary model-footer-text">(24
                                                Review)</span>
                                        </div>
                                        <div class="col-4 text-end">
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
                        alert('An error occurred while loading the models. Please try again later.');
                    }
                });
            }

            loadModels(currentPage);

            $('#NextButton').on('click', function(event) {
                event.preventDefault();
                currentPage++;
                loadModels(currentPage);

                $("#PageIndicator").text(currentPage);

                $("#PrevButton").removeAttr("disabled");
            });

            $('#PrevButton').on('click', function(event) {
                if (currentPage > 1) {
                    event.preventDefault();
                    currentPage--;
                    loadModels(currentPage);

                    $("#PageIndicator").text(currentPage);

                    if (currentPage === 1) {
                        $("#PrevButton").attr("disabled", "disabled");
                        $("#NextButton").removeAttr("disabled");
                    }
                }
            });

            function ShareModel(sha3_hash) {
                $("#shareModal").modal('show');

                // Select the element with the ID "shareLink"
                var shareLinkElement = document.getElementById("shareLink");

                // Check if the element exists before attempting to change its content
                if (shareLinkElement) {
                    // Change the content of the element
                    shareLinkElement.textContent = (sha3_hash);
                }
            }

            document.getElementById("shareLink").addEventListener("click", function() {
                navigator.clipboard.writeText(document.getElementById("shareLink").textContent);
            });
        });
    </script>
@endsection
