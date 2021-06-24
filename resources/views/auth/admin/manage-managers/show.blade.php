@extends('layouts.admin.app')

@section('title', 'Manager')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- font awesome icon -->
<script src="https://kit.fontawesome.com/f8dd01d0f4.js" crossorigin="anonymous"></script>
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/crudpage.css') }}" />
@endsection

@section('content')

<!-- Content -->
<div class="container content">
    @if(session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger mt-4">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <div class="d-flex justify-content-end">
                    <a class="cta-sm mb-2" href="{{ route('admin') }}">Back</a>
                </div>

                <form class="form-crud row g-3" action="{{ route('manager.delete', $manager->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="col-md-12">
                        <label for="lapak" class="form-label">Lapak UMKM</label>
                        <input readonly type="text" class="form-control id=" lapak" name="lapak"
                            value="{{ $manager->lapakumkm->nama }}" />
                        <a class="btn btn-primary mt-2"
                            href="{{ route('admin.lapakumkms.edit',$manager->lapakumkm->slug) }}">Lihat Lapak</a>
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input readonly type="text" class="form-control @error('nama') is-invalid @enderror" id="name"
                            name="nama" value="{{ old('nama') ?? $manager->nama }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK</label>
                        <input readonly type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            maxlength="16" name="nik" value="{{ old('nik')?? $manager->nik }}" />
                    </div>
                    <div class="col-12  ">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea readonly name="alamat" id="address" cols="100%" rows="5"
                            class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat">{{ old('alamat')?? $manager->alamat }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="no_wa" class="form-label">No WA</label>
                        <input readonly type="text" class="form-control @error('no_wa') is-invalid @enderror"
                            name="no_wa" value="{{ old('no_wa') ?? $manager->no_wa}}" id="no_wa" />
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input readonly type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') ?? $manager->email }}" id="email" />
                    </div>
                    <div class="col-12">
                        <label for="ktp_img" class="form-label">Scan KTP : </label>
                        <img class="mt-3 mb-5" style="width: 80%" src="{{ asset('/storage/'.$manager->ktp_img) }}"
                            alt="galeri" />
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-danger">Delete Accout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir content -->

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
