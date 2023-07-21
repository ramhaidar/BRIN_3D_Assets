@section('title', 'Home')

@extends('app')

@section('content_01')
    <div class="row ps-5 justify-content-center">
        <div class="col ps-5">
            <h1 class="poppins-bold pb-4">About Us</h1>
            <p class="poppins-regular pt-4">BRIN adalah platform khusus yang menyediakan akses ke
                berbagai macam aset 3D
                berkualitas tinggi. Kami didedikasikan untuk memenuhi kebutuhan para profesional dan penggemar yang tertarik
                dalam industri desain, animasi, game, dan produksi film.
                <br><br>
                Tim kami yang berpengalaman telah bekerja keras untuk mengumpulkan dan mengkurasi koleksi yang luas dari
                aset 3D terbaik. Kami menawarkan berbagai kategori, termasuk model karakter, lingkungan, tekstur, efek
                visual, dan masih banyak lagi. Setiap aset dijamin memiliki kualitas yang luar biasa dan dapat disesuaikan
                sesuai kebutuhan proyek Anda.
                <br><br>
                Kami berkomitmen untuk menyediakan pengalaman yang mudah, cepat, dan terjangkau. Dengan navigasi yang
                intuitif, Anda dapat dengan mudah menjelajahi koleksi kami, melakukan pencarian yang spesifik, dan mengunduh
                aset yang Anda butuhkan. Kami juga memberikan dukungan pelanggan yang responsif untuk membantu menjawab
                pertanyaan Anda dan memberikan solusi yang dibutuhkan.
            </p>
        </div>
        <div class="col justify-content-end mx-0 px-0">
            <img class="float-end mx-auto" src="{{ asset('AboutUs/GedungBRIN.png') }}" width="auto" height="auto">
        </div>
    </div>
@endsection
