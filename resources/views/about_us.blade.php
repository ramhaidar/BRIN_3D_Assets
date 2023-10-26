@section('title', 'About Us')

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
    <main class="container-fluid d-flex h-100 w-100">
        <div class="pt-5 mt-5">
            <div class="container-fluid d-flex justify-content-center align-items-center px-0 mx-0">
                <div class="row ps-5">
                    <div class="col ps-5">
                        <h1 class="poppins-bold pb-4">About Us</h1>
                        <p class="poppins-regular pt-4">BRIN adalah platform khusus yang menyediakan akses ke
                            berbagai macam aset 3D
                            berkualitas tinggi. Kami didedikasikan untuk memenuhi kebutuhan para profesional dan penggemar
                            yang
                            tertarik
                            dalam industri desain, animasi, game, dan produksi film.
                            <br><br>
                            Tim kami yang berpengalaman telah bekerja keras untuk mengumpulkan dan mengkurasi koleksi yang
                            luas dari
                            aset 3D terbaik. Kami menawarkan berbagai kategori, termasuk model karakter, lingkungan,
                            tekstur, efek
                            visual, dan masih banyak lagi. Setiap aset dijamin memiliki kualitas yang luar biasa dan dapat
                            disesuaikan
                            sesuai kebutuhan proyek Anda.
                            <br><br>
                            Kami berkomitmen untuk menyediakan pengalaman yang mudah, cepat, dan terjangkau. Dengan navigasi
                            yang
                            intuitif, Anda dapat dengan mudah menjelajahi koleksi kami, melakukan pencarian yang spesifik,
                            dan
                            mengunduh
                            aset yang Anda butuhkan. Kami juga memberikan dukungan pelanggan yang responsif untuk membantu
                            menjawab
                            pertanyaan Anda dan memberikan solusi yang dibutuhkan.
                        </p>
                    </div>
                    <div class="col justify-content-end mx-0 px-0">
                        <img class="float-end mx-auto" src="{{ asset('AboutUs/GedungBRIN.png') }}" width="auto"
                            height="auto">
                    </div>
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
@endsection
