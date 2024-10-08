@section('title', 'Sign In')

@extends('app')

@section('customStyle')
    <style>
        html,
        body,
        .container-fluid {
            height: 92.5%;
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
    @if ($errors->any() || session()->has('success') || session()->has('customError'))
        <script>
            $(document).ready(function() {
                $("#popupModal").modal('show');
            });
        </script>
    @endif

    <main class="container-fluid h-100 w-100" style="background-color: transparent; min-height: 92.2vh;">
        <div class="flex-fill pt-3 px-0 py-0 h-100">
            <div class="row px-0 py-0 h-100" style="background-color: transparent">
                <div class="col-6 px-0 py-0 h-100" style="background-color: #F6F6F6">
                    <div class="pt-5 px-5 ms-5">
                        <a class="navbar-brand" href="{{ url()->current() }}">
                            <img class="align-text-top px-2" src="{{ asset('Logo/Logo BRIN_BIG.png') }}" width="auto"
                                height="75">
                        </a>
                        <div class="pt-1 mt-5 py-0 pe-5 me-5">
                            <h1 class="poppins-bold">Sign In</h1>
                            <h3 class="pt-4 poppins-bold">Your Account</h3>

                            <form class="pt-3" action="" method="POST" autocomplete="off">
                                @CSRF
                                <label class="form-label poppins-regular" for="Username">Username or Email</label>
                                <div class="input-group mb-3 shadow-sm">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input class="form-control poppins-regular" id="Username" name="Username"
                                        type="username" value="{{ old('Username') }}" aria-describedby="Username"
                                        placeholder="Username or Email" required>
                                </div>

                                <label class="form-label poppins-regular" for="Password">Password</label>
                                <div class="input-group mb-3 shadow-sm">
                                    <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                    <input class="form-control poppins-regular" id="Password" name="Password"
                                        type="password" value="{{ old('Password') }}" aria-describedby="Password"
                                        placeholder="Password" required>

                                    <div>
                                        <button class="btn btn-danger toggle-password" id="toggle-password" type="button">
                                            <i class="bi bi-eye-slash-fill"></i>
                                        </button>
                                    </div>
                                </div>

                                <label class="form-label poppins-regular" for="Captcha">Captcha</label>
                                <div class="input-group mb-3 shadow-sm">
                                    <span class="input-group-text"><i class="bi bi-robot"></i></span>

                                    <input class="form-control" id="captcha" name="Captcha" type="text"
                                        placeholder="Enter Captcha" required>

                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button class="btn btn-danger reload" id="reload" type="button">
                                            ↻
                                        </button>
                                    </div>
                                </div>

                                <div class="px-0 py-0">
                                    <p class="poppins-regular">Don't have an account?
                                        <a class="poppins-regular" href="{{ route('signup') }}"
                                            style="text-decoration: none;">Sign Up
                                        </a>
                                    </p>
                                </div>

                                <div class="d-grid gap-2 pt-2">
                                    <button class="btn btn-danger poppins-regular shadow-sm" type="submit"
                                        style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem;">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col d-flex mx-0 px-0 d-flex align-items-center justify-content-end"
                    style="background-color: transparent">
                    <img class="float-end" src="{{ asset('AboutUs/Gambar Gedung BRIN.png') }}" width="auto"
                        height="650">
                </div>

            </div>
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
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                    console.log(data.captcha);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                var passwordField = $("#Password");
                var icon = $(".toggle-password i");

                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                    icon.removeClass("bi-eye-slash-fill");
                    icon.addClass("bi-eye-fill");
                } else {
                    passwordField.attr("type", "password");
                    icon.removeClass("bi-eye-fill");
                    icon.addClass("bi-eye-slash-fill");
                }
            });
        });
    </script>
@endsection
