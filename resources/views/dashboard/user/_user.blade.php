@section('title')
    @hasSection('subtitle')
        @yield('subtitle') | Dashboard User
    @else
    @endif
@endsection

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

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #222222;
            background-color: transparent;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
        }

        .nav-pills .nav-link {
            color: #222222;
            background-color: transparent;
        }

        .col-custom {
            flex: 0 0 auto;
            width: 18%;
        }

        main body div {
            font-family: 'Poppins', 'Helvetica', sans-serif;
        }
    </style>

    @yield('customStyle2')
@endsection

@section('content_01')
    @if ($errors->any() || session()->has('success') || session()->has('customError'))
        <script>
            $(document).ready(function() {
                $("#popupModal").modal('show');
            });
        </script>
    @endif

    <main class="container supreme-container h-100 w-100 px-0 py-0"
        style="background-color: transparent; min-width: 100%; min-height: 107.5%">
        <div class="container pt-3 h-100 w-100 px-0 py-0" style="background-color: transparent; min-width: 100%">
            <div class="row mx-0 my-0 w-100 h-100">
                <div class="col-custom px-0 py-0 h-100" style="background-color: #222222">
                    <div class="flex-fill px-0 py-0 h-100">
                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary h-100 w-100" style="width: 280px;">
                            <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
                                href="{{ url()->current() }}">
                                <i class="bi bi-gear-wide-connected ps-2 pe-3" style="font-size: 25px;"></i>
                                <span class="poppins-bold py-0 text-uppercase" style="font-size: 20px">Dashboard
                                    User</span>
                            </a>
                            <hr>
                            <ul class="nav nav-pills flex-column mb-auto mx-2">
                                <li class="nav-item py-1">
                                    <a class="nav-link {{ $activeNavItem == 'dashboard_user_uploads' ? 'active' : '' }} d-flex align-items-center rounded-3 py-3"
                                        href="{{ route('dashboard_user_uploads') }}" aria-current="page">
                                        <i class="bi bi-cloud-arrow-up-fill me-3 customShadow"
                                            style="font-size: 15px;
                                            color: {{ $activeNavItem == 'dashboard_user_uploads' ? 'white' : '#BE3535' }};
                                            background-color: {{ $activeNavItem == 'dashboard_user_uploads' ? '#BE3535' : 'white' }};
                                            border-radius: 35%; padding: 4.75px; min-width: 35px; text-align: center;"></i>
                                        <span class="poppins-bold" style="color: #222222">Uploads</span>
                                    </a>
                                </li>
                                <li class="nav-item py-1">
                                    <a class="nav-link {{ $activeNavItem == 'dashboard_user_downloads' ? 'active' : '' }} d-flex align-items-center rounded-3 py-3"
                                        href="{{ route('dashboard_user_downloads') }}" aria-current="page">
                                        <i class="bi bi-cloud-arrow-down-fill me-3 customShadow"
                                            style="font-size: 15px;
                                            color: {{ $activeNavItem == 'dashboard_user_downloads' ? 'white' : '#BE3535' }};
                                            background-color: {{ $activeNavItem == 'dashboard_user_downloads' ? '#BE3535' : 'white' }};
                                            border-radius: 35%; padding: 4.75px; min-width: 35px; text-align: center;"></i>
                                        <span class="poppins-bold" style="color: #5e5e5e">Downloads</span>
                                    </a>
                                </li>
                                <li class="nav-item py-1">
                                    <a class="nav-link {{ $activeNavItem == 'dashboard_user_favorites' ? 'active' : '' }} d-flex align-items-center rounded-3 py-3"
                                        href="{{ route('dashboard_user_favorites') }}" aria-current="page">
                                        <i class="bi bi-heart-fill me-3 customShadow"
                                            style="font-size: 15px;
                                            color: {{ $activeNavItem == 'dashboard_user_favorites' ? 'white' : '#BE3535' }};
                                            background-color: {{ $activeNavItem == 'dashboard_user_favorites' ? '#BE3535' : 'white' }};
                                            border-radius: 35%; padding: 4.75px; min-width: 35px; text-align: center;"></i>
                                        <span class="poppins-bold" style="color: #5e5e5e">Favorites</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item py-1">
                                    <a class="nav-link {{ $activeNavItem == 'dashboard_user_favorites' ? 'active' : '' }} d-flex align-items-center rounded-3 py-3"
                                        href="{{ route('dashboard_user_favorites') }}"aria-current="page">
                                        <i class="bi bi-heart-fill me-3"
                                            style="font-size: 15px; color: #BE3535; background-color: white; border-radius: 35%; padding: 4.75px; min-width: 35px; text-align: center;"></i>
                                        <span class="poppins-bold" style="color: #5e5e5e">Favorites</span>
                                    </a> --}}
                                </li>
                                {{-- <li class="border-top border-secondary-subtle my-3"></li> --}}
                            </ul>
                            <hr>
                            <div class="dropdown">
                                {{-- <a class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <img class="rounded-circle me-2" src="https://github.com/mdo.png" alt="" width="32"
                            height="32">
                        <strong>mdo</strong>
                    </a> --}}
                                <a class="nav-link d-flex align-items-center rounded-3 ps-3 py-3" href="#"
                                    aria-current="page">
                                    <i class="bi bi-person-fill me-3"
                                        style="font-size: 15px; color: #BE3535; background-color: white; border-radius: 35%; padding: 4.75px; min-width: 35px; text-align: center;"></i>
                                    <span class="poppins-bold" style="color: #5e5e5e">Account</span>
                                </a>
                                <ul class="dropdown-menu text-small shadow">
                                    <li><a class="dropdown-item" href="#">New project...</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mx-0 my-0 px-0 py-0 w-100 h-100"
                    style="background-color: transparent; overflow-x: hidden; overflow-y: auto">
                    @yield('dashboard_content')
                </div>
            </div>
        </div>
    </main>
@endsection
