@extends('layouts.app')

@section('title', 'Penginapan')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/penginapan.css') }}" />
@endsection

@section('content')

<!-- Bagian Atas -->
<div class="container atas">
    <div class="row">
        <!-- Penginapan Atas kiri -->
        <div class="col-md-6">
            <div class="custom-card p-md-4">
                <h6>Anda memiliki penginapan di Kota Madiun?</h6>
                <a class="linkhijau" href="{{ route('lodger.register') }}">Promosikan</a>
                <a class="linkabu ms-3" href="{{ route('lodger.login') }}">Login</a>
            </div>
        </div>
        <!-- Akhir Penginapan Atas kiri -->

        <!-- Pencarian Atas kanan -->
        <form class="col-md-6 d-flex align-items-center pencarian" method="POST">
            @csrf
            @method('post')
            <input class="form-control form-control-lg-2" type="text" placeholder="Temukan Penginapan di Madiun"
                aria-label="default input example" name="search" />
            <!-- Button cari -->
            <button type="submit" class="btn cta">Cari</button>
        </form>
        <!-- Akhir Pencarian Atas Kanan -->
    </div>
</div>
<!-- Akhir Bagian Atas -->

<!-- Semua Penginapan -->
<div class="container semua-penginapan">
    <div class="row judul">
        <h3>Semua Penginapan</h3>
    </div>
    <!-- Semua Card-card  penginapan -->
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between">

        @forelse ($penginapans as $penginapan)
        <!-- Card wisata [1,2] -->
        <div class="col-md-4">
            <div class="card h-100 custom-card">
                <div class="card-body">
                    <img src="{{ asset('/storage/'.$penginapan->imgdepan) }}" class="card-img-top" alt="psc" />
                    <h5 class="text-center mb-5 mt-5">{{ $penginapan->nama }}</h5>
                    <p class="text-center">{{ $penginapan->lokasi }}</p>
                    <div class="d-flex justify-content-between mt-sm-5">
                        <h5 class="align-self-center">{{ $penginapan->harga }}</h5>
                        <a class="cta" href="{{ route('penginapans.show', $penginapan->slug) }}">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- JIKA BELUM ADA DATA -->
        <div class="belum-ada-data">
            <h4>Data tidak ditemukan</h4>
            <figure>
                <img style="width: 80%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                <figcaption style="font-size: 5pt"><a href="https://www.freepik.com/free-photos-vectors/data">Data
                        vector
                        created by stories -
                        www.freepik.com</a></figcaption>
            </figure>
        </div>
        @endforelse
    </div>
    <!-- Akhir semua card-card penginapan -->
    <div class="d-flex justify-content-center mt-5">
        {{ $penginapans->links() }}
    </div>
</div>
<!-- Akhir Semua Penginapan -->

<!-- Footer -->
<footer class="background">
    <p>MadiunWisata | 2021</p>
</footer>
<!-- Akhir Footer -->
@endsection()

@section('script')
<!-- AOS Animasi -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
