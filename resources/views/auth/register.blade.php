@extends('layouts/app')

@section('title', 'Wisata')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="CSS/tempatwisata.css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}"
                        enctype="multipart/form-data">
                        @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"
                            enctype="multipart/form-data">
                            @endisset
                            @csrf



                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama') }}" autocomplete="nama" autofocus>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @if(request()->is('register/lodger'))
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik"
                                    class="col-md-4 col-form-label text-md-right">{{ __('No. KTP') }}</label>

                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                                        name="nik" value="{{ old('nik') }}" autocomplete="nik" maxlength="16">

                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ktp_img"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Bukti Foto KTP') }}</label>

                                <div class="col-md-6">
                                    <input id="ktp_img" type="file"
                                        class="form-control @error('nik') is-invalid @enderror" name="ktp_img"
                                        value="{{ old('ktp_img') }}" autocomplete="ktp_img">

                                    @error('ktp_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_telp"
                                    class="col-md-4 col-form-label text-md-right">{{ __('No. Telp') }}</label>

                                <div class="col-md-6">
                                    <input id="no_telp" type="text"
                                        class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                                        value="{{ old('no_telp') }}" autocomplete="no_telp">

                                    @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_wa"
                                    class="col-md-4 col-form-label text-md-right">{{ __('No. WA') }}</label>

                                <div class="col-md-6">
                                    <input id="no_wa" type="text"
                                        class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
                                        value="{{ old('no_wa') }}" autocomplete="no_wa">

                                    @error('no_wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <input id="alamat" type="text"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        value="{{ old('alamat') }}" autocomplete="alamat">

                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @else

                            <div class="form-group row">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @endif

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
