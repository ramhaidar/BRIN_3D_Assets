@section('footer')
    <div class="container-fluid h-100 w-100 pt-5" style="background-color: #F7F9FA;">
        <div class="container h-100 w-100">
            <footer class="pb-3">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a class="navbar-brand" href="{{ route('home') }}">
                                    <img class="d-inline-block align-text-top" src="{{ asset('Logo/Alt_Logo_BRIN 1.png') }}"
                                        width="auto" height="40">
                                </a>
                            </li>
                            <li class="nav-item my-2">
                                <a class="nav-link p-0 mulish-regular" href="{{ route('home') }}">BRIN 3D
                                    Assets</a>
                            </li>

                            <li class="nav-item mb-2">
                                <div class="row justify-content-start">
                                    <div class="col-1">
                                        <a href="https://www.youtube.com/c/BadanRisetdanInovasiNasionalBRIN/featured"
                                            style="text-decoration: none; color: black;">
                                            <i class="bi bi-youtube"></i>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="https://twitter.com/brin_indonesia"
                                            style="text-decoration: none; color: black;">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="https://www.instagram.com/brin_indonesia"
                                            style="text-decoration: none; color: black;">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="https://www.facebook.com/brin.indonesia"
                                            style="text-decoration: none; color: black;">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-2 mb-3">
                        <h5 class="montserrat-bold py-2">Contact Info</h5>

                        <div class="container-fluid px-0">
                            <div class="row align-items-start">
                                <div class="col-1">
                                    <i class="bi bi-geo-alt" style="color: #0a58cc"></i>
                                </div>
                                <div class="col">
                                    <p class="mulish-regular">Jl. Sangkuriang, Dago, Kecamatan Coblong, Kota Bandung,
                                        Jawa Barat 40135</p>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid px-0">
                            <div class="row align-items-start">
                                <div class="col-1">
                                    <i class="bi bi-telephone" style="color: #0a58cc"></i>
                                </div>
                                <div class="col">
                                    <p class="mulish-regular">14022</p>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid px-0">
                            <div class="row align-items-start">
                                <div class="col-1">
                                    <i class="bi bi-envelope" style="color: #0a58cc"></i>
                                </div>
                                <div class="col">
                                    <p class="mulish-regular">BRIN@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 offset-md-1">
                        <form>
                            <h5 class="montserrat-bold py-2">Get in touch</h5>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2 py-2">
                                <label class="visually-hidden" for="newsletter1">Name</label>
                                <input class="form-control rounded-3 mulish-regular" id="newsletter1" type="text"
                                    placeholder="Your Name">
                            </div>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2 py-2">
                                <label class="visually-hidden" for="newsletter1">Email</label>
                                <input class="form-control rounded-3 mulish-regular" id="newsletter1" type="text"
                                    placeholder="Your Email">
                            </div>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2 py-2">
                                <label class="visually-hidden" for="newsletter1">Message</label>
                                <textarea class="form-control rounded-3 mulish-regular" id="newsletter1" type="text" rows="3"
                                    placeholder="Your Message"></textarea>
                            </div>
                            <div class="d-grid gap-2 col-2 py-2">
                                <button class="btn btn-primary rounded-pill montserrat-regular" type="button">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </footer>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-center pt-2 border-top w-100 h-100 mulish-regular">
            <p>©2023 BRIN Ltd, All rights reserved.</p>
        </div>
    </div>
@endsection
