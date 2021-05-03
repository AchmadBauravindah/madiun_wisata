<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- Untuk mengaktifkan navbar di tulisan akan dibuat kondisi, halaman apa yang aktif --}}

                {{-- {{ dd((auth()->guard('admin')->check())) }} --}}
                @if (auth()->guard('admin')->check())
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active':''}}" aria-current="page" href="/">Admin</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active':''}}" aria-current="page" href="/">Home</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('wisatas') ? ' active':''}}" href="/wisatas">Tempat
                        Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('penginapans') ? ' active':''}}"
                        href="/penginapans">Penginapan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('lapakumkms') ? ' active':''}}" href="/lapakumkms">Lapak UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('mabours') ? ' active':''}}" href="/mabours">Mabour</a>
                </li>
            </ul>
            @if (auth()->guard('admin')->check())
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
            </ul>
            @elseif (auth()->guard('lodger')->check())
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout Lodger') }}</a>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('showAdminLoginForm') }}">{{ __('Login As Admin') }}</a>
            </ul>
            @endif
        </div>
    </div>
</nav>
