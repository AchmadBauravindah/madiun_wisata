@extends('layouts/app')

@section('title', 'Wisata')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/lapakumkm.css') }}" />
@endsection

@section('content')
<main class="atas">
    <!-- Daftar keseluruhan kios-->
    <div class="container lapak">
        <div class="row justify-content-between">
            <div class="kiri col-md-8">
                <h2 class="text-center">{{ $lapakumkm->nama }}</h2>
                <img class="mx-auto d-block gambarlapak" src="{{ asset('/storage/'.$lapakumkm->foto) }}"
                    alt="sumber wangi" />

                @forelse ($lapakumkm->kioses as $kios)
                {{-- Tampil hanya yang disetujui --}}
                @if ($kios->agree == 2)
                <!-- Card per Kios -->
                <div class="card mb-3 custom-card">
                    <div class="row g-0">
                        <div class="card-body">
                            <h5 class="card-title judul text-center">{{ $kios->nama }}</h5>
                            <h6>No Kios</h6>
                            <p>{{ $kios->no_kios }}</p>
                            <h6>Pemilik:</h6>
                            <p>{{ $kios->seller->nama }}</p>
                            <h6>Menu Makanan</h6>
                            <table class="table table-sm">
                                <tbody>
                                    @forelse ($kios->menus as $menu)
                                    @if ($menu->jenis_menu == 1)
                                    <tr>
                                        <td>{{ $menu->nama }}</td>
                                        <td>Rp {{ $menu->harga }}</td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td>Belum ada menu</td>
                                        <td>Belum ada harga</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <h6>Menu Minuman</h6>
                            <table class="table table-sm">
                                <tbody>
                                    @forelse ($kios->menus as $menu)
                                    @if ($menu->jenis_menu == 0)
                                    <tr>
                                        <td>{{ $menu->nama }}</td>
                                        <td>Rp {{ $menu->harga }}</td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td>Belum ada menu</td>
                                        <td>Belum ada harga</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                <!-- Akhir card per kios-->
                @empty
                <!-- JIKA BELUM ADA DATA -->
                <div class="belum-ada-data text-center">
                    <h6>Tidak ada kios</h6>
                    <figure>
                        <img style="width: 30%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                        <figcaption style="font-size: 5pt"><a
                                href="https://www.freepik.com/free-photos-vectors/data">Data vector
                                created by stories -
                                www.freepik.com</a></figcaption>
                    </figure>
                </div>
                @endforelse
            </div>
            <!-- Akhir daftar keseluruhan kios -->

            <!-- Data pengelola lapak -->
            <div class="kanan col-md-4">
                <div class="custom-sidebar">
                    @if ($lapakumkm->manager)
                    <h6>Nama Pengelola</h6>
                    <p>{{ $lapakumkm->manager->nama }}</p>
                    <h6>No HP</h6>
                    <p>{{ $lapakumkm->manager->no_wa }}</p>
                    @else
                    <h6>Pengelola Lapak</h6>
                    <p>Belum Terdaftar</p>
                    @endif
                    <h6>Lokasi</h6>
                    <p>{{ $lapakumkm->lokasi }}</p>
                </div>
            </div>
        </div>
    </div>
</main>

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
