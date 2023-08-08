@section('title', 'Sign In')

@extends('app')

@section('customStyle')
    <style>
        html,
        body,
        .container-fluid {
            height: 92.5%;
        }
    </style>
@endsection

@section('content_01')
    <main class="container-fluid h-100 w-100" style="background-color: transparent; min-height: 92.2vh;">
        <div class="flex-fill pt-3 px-0 py-0 h-100">
            <div class="row px-0 py-0 h-100" style="background-color: transparent">
                <div class="col-6 px-0 py-0 h-100" style="background-color: #F6F6F6">
                    <div class="pt-5 px-5 ms-5">
                        <a class="navbar-brand" href="{{ url()->current() }}">
                            <img class="align-text-top px-2" src="{{ asset('Logo/Logo BRIN_BIG.png') }}" width="auto"
                                height="75">
                        </a>
                        <div class="pt-5 mt-5 py-0 pe-5 me-5">
                            <h1 class="poppins-bold">Sign In</h1>
                            <h3 class="pt-4 poppins-bold">Your Account</h3>

                            <form class="pt-3" action="" method="POST">
                                @CSRF
                                <label class="form-label poppins-regular" for="Username">Username or Email</label>
                                <div class="input-group mb-3 shadow-sm">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input class="form-control poppins-regular" id="Username" type="username"
                                        aria-describedby="Username" placeholder="Username or Email">
                                </div>

                                <label class="form-label poppins-regular" for="Password">Password</label>
                                <div class="input-group mb-3 shadow-sm">
                                    <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                    <input class="form-control poppins-regular" id="Password" type="password"
                                        aria-describedby="Password" placeholder="Password">
                                </div>

                                <div class="px-0 py-0">
                                    <p class="poppins-regular">Don't have an account?
                                        <a class="poppins-regular" href="{{ route('signup') }}"
                                            style="text-decoration: none;">Sign Up
                                        </a>
                                    </p>
                                </div>

                                <div class="d-grid gap-2 pt-5">
                                    <button class="btn btn-danger poppins-regular shadow-sm" type="submit"
                                        style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem;">Sign
                                        Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col d-flex mx-0 px-0 d-flex align-items-center justify-content-end"
                    style="background-color: transparent">
                    <img class="float-end" src="{{ asset('AboutUs/Gambar Gedung BRIN.png') }}" width="auto"
                        height="700">
                </div>

            </div>
        </div>
    </main>
@endsection
