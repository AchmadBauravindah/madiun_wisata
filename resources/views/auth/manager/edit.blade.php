@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Atur Akun manager</h1>

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

    <div class="row">
        <div class="card">
            <div class="card-header">Update Akun: {{ $manager->nama }}</div>

            <div class="card-body">
                <form action="{{ route('manager.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama">Nama manager</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama')??$manager->nama }}">
                        @error('nama')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nik">nik manager</label>
                        <input type="text" name="nik" id="nik" class="form-control"
                            value="{{ old('nik')??$manager->nik }}" maxlength="16">
                        @error('nik')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email manager</label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="{{ old('email')??$manager->email }}">
                        @error('email')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="ktp_img">Foto KTP</label>
                        <div class="col-md-6">
                            <img src="{{ asset('/storage/'.$manager->ktp_img) }}" width="100px">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="ktp_img" id="ktp_img" class="form-control"
                                value="{{ old('ktp_img') ?? $manager->ktp_img }}">
                        </div>
                        @error('ktp_img')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_wa">no_wa manager</label>
                        <input type="text" name="no_wa" id="no_wa" class="form-control"
                            value="{{ old('no_wa')??$manager->no_wa }}">
                        @error('no_wa')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"
                            rows="4">{{ old('alamat') ?? $manager->alamat }}</textarea>
                        @error('alamat')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">ganti password manager (opsional)</label>
                        <input type="text" name="password" id="password" class="form-control">
                        @error('password')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">password_confirmation manager</label>
                        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
