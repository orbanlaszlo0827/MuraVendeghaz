@props([
    'heroImage' => null,
    'heroTitle' => null
])

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Üdvözlünk!') | Mura Vendégház</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <header class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-light py-2 pb-lg-0">
            
            <div class="container-lg flex-lg-column align-items-center">   
                
                <div class="d-flex justify-content-between align-items-center w-100">
                    
                    <a class="navbar-brand mx-lg-auto p-0 m-0" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="Mura Vendégház" class="img-fluid logo-image">
                    </a>

                    <button class="navbar-toggler border-0 shadow-none px-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Menü megnyitása">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>

                <div class="collapse navbar-collapse w-100 justify-content-center mt-3 mt-lg-1" id="mainNavbar">
                    
                    <ul class="navbar-nav align-items-center gap-3 gap-lg-4 text-center pb-3 pb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha {{ request()->routeIs('rooms') ? 'active' : '' }}" href="{{ route('rooms') }}">Szállásunk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Szolgáltatások</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha {{ request()->routeIs('area') ? 'active' : '' }}" href="{{ route('area') }}">Környék</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galéria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha {{ request()->routeIs('prices_contact') ? 'active' : '' }}" href="{{ route('prices_contact') }}">Árak & Kapcsolat</a>
                        </li>
                        
                        <li class="nav-item mt-2 mt-lg-0">
                            <a href="{{ route('booking.index') }}" class="btn btn-primary py-1 px-3 rounded-pill btn-foglalas">Foglalás</a>
                        </li>
                    </ul>
                    
                </div>

            </div>
        </nav>
        @if($heroImage && $heroTitle)
            <div class="position-relative w-100">
                
                <img src="{{ asset('images/' . $heroImage) }}" alt="{{ $heroTitle }}" class="w-100 hero-image">
                
                <div class="position-absolute top-0 inset-s-0 w-100 h-100 d-flex justify-content-center align-items-center">
                    
                    <div class="hero-text-bg px-4 py-3 rounded text-center shadow">
                        <h1 class="text-white fw-bold mb-0 display-3 ls-2">{{ $heroTitle }}</h1>
                    </div>

                </div>
            </div>
        @endif
    </header>
    
    <main>
        {{ $slot }}
    </main>

    <footer class="bg-white">
        <div class="container-fluid px-0 pt-4 pt-lg-5">
            
            <div class="row justify-content-center mb-4 mx-0">
                <div class="col-12 col-md-8 col-lg-4 text-center px-4 d-flex flex-column gap-2">
                    <h2>Mura Vendégház</h2>
                    <p>Vendégházunk ideális búvóhelyet kínál az aktív kikapcsolódást kereső családoknak és a csendre vágyó pároknak egyaránt. Tapasztalja meg nálunk a Mura folyó és a Zalai-dombság lágy öle nyújtotta teljes kikapcsolódást.</p>
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center mx-0 mb-4">
                <div class="col-12 d-flex justify-content-center">
                    <ul class="list-unstyled d-flex flex-column flex-lg-row align-items-center gap-3 gap-md-5 mb-0">
                        <li>
                            <a href="https://maps.google.com/?q=8834+Murakeresztúr,+Alkotmány+út+11" target="_blank" class="nav-link nav-link-animated text-black">
                                <i class="bi bi-geo-alt-fill"></i> 8834 Murakeresztúr, Alkotmány út 11.
                            </a>
                        </li>
                        <li>
                            <a href="tel:{{ str_replace(' ', '', $siteSettings['contact_phone'] ?? '') }}" class="nav-link nav-link-animated text-black">
                                <i class="bi bi-telephone-fill"></i> {{ $siteSettings['contact_phone'] ?? '+36 30 000 0000' }}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@muravendeghaz.hu' }}" class="nav-link nav-link-animated text-black">
                                <i class="bi bi-envelope-fill"></i> {{ $siteSettings['contact_email'] ?? 'info@muravendeghaz.hu' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mx-0 bg-secondary py-3">
                <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center">                
                        <ul class="list-unstyled d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-3 gap-md-4 mb-0">
                            <li><a class="nav-link" href="{{ route('home') }}">Főoldal</a></li>
                            <li><a class="nav-link" href="{{ route('rooms') }}">Szállásunk</a></li>
                            <li><a class="nav-link" href="#">Szolgáltatások</a></li>
                            <li><a class="nav-link" href="{{ route('area') }}">Környék</a></li>
                            <li><a class="nav-link" href="{{ route('gallery') }}">Galéria</a></li>
                            <li><a class="nav-link" href="{{ route('prices_contact') }}">Árak & Kapcsolat</a></li>
                        </ul>
                </div>
            </div>

            <div class="row mx-0 py-1 bg-primary d-flex align-items-center justify-content-center justify-content-md-between">
                <div class="col-12 col-md-6 d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-2 gap-md-4 order-1 order-md-2">
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">ÁSZF</a>
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">Impresszum</a>
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">Házirend</a>
                    <p class="text-white text-center mb-0"><b>NTAK: </b>MA-19006725</p>
                </div>
                <div class="col-12 col-md-6 text-white text-center text-md-start order-2 order-md-1">
                    <p class="mb-0">&copy; {{ date('Y') }} Mura Vendégház. Minden jog fenntartva.</p>
                </div>
            </div>

        </div>
    </footer>

    @stack('scripts')

</body>
</html>