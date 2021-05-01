@extends('layouts.auth')

{{-- Ini terlalu ga rapi (harusnya navigasi ada di file app), ganti kalo nemu cara lain --}}
@section('navigation')
@if(request()->is('admin/*') and auth()->user())
@include('layouts.navigation_admin')
@elseif (!auth()->user())
@include('layouts.navigation')
@endif
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss Lodger!
                    <br>
                    Namamu adalah {{ request()->user()->nama }}
                    <br>
                    No Ktpmu adalah {{ auth()->user()->no_ktp }}

                    {{-- {{ user() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
