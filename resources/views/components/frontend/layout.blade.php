<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Üdvözlünk!') | Mura Vendégház</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-light py-2 pb-lg-0">
            
            <div class="container-lg flex-lg-column align-items-center">   
                
                <div class="d-flex justify-content-between align-items-center w-100">
                    
                    <a class="navbar-brand mx-lg-auto p-0 m-0" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="Mura Vendégház" class="img-fluid" style="max-height: 60px; width: auto">
                    </a>

                    <button class="navbar-toggler border-0 shadow-none px-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Menü megnyitása">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>

                <div class="collapse navbar-collapse w-100 justify-content-center mt-3 mt-lg-1" id="mainNavbar">
                    
                    <ul class="navbar-nav align-items-center gap-3 gap-lg-4 text-center pb-3 pb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-animated" href="#">Szállásunk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-animated" href="#">Szolgáltatások</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-animated" href="#">Környék</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-animated" href="#">Galéria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-animated" href="#">Árak & Kapcsolat</a>
                        </li>
                        
                        <li class="nav-item mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary py-1 px-3 rounded-pill btn-foglalas">Foglalás</a>
                        </li>
                    </ul>
                    
                </div>

            </div>
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>

<footer>
    <div class="container-fluid px-0 pt-4">
        
        <div class="row justify-content-center mb-4 mx-0">
            <div class="col-12 col-md-8 col-lg-6 text-center px-4">
                <h2>Mura Vendégház</h2>
                <p>Vendégházunk ideális búvóhelyet kínál az aktív kikapcsolódást kereső családoknak és a csendre vágyó pároknak egyaránt. Tapasztalja meg nálunk a Mura folyó és a Zalai-dombság lágy öle nyújtotta teljes kikapcsolódást.</p>
            </div>
        </div>

        <div class="row justify-content-center mx-0 mb-4">
            <div class="col-12 d-flex justify-content-center">
                <ul class="list-unstyled d-flex flex-column flex-md-row align-items-center gap-3 gap-md-5 mb-0">
                    <li>
                        <a href="https://maps.google.com/?q=8834+Murakeresztúr,+Alkotmány+út+11" target="_blank" class="nav-link nav-link-animated text-black">
                            <i class="bi bi-geo-alt-fill"></i> 8834 Murakeresztúr, Alkotmány út 11.
                        </a>
                    </li>
                    <li>
                        <a href="tel:+36305054042" class="nav-link nav-link-animated text-black">
                            <i class="bi bi-telephone-fill"></i> +36 30 505 4042
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@muravendeghaz.hu" class="nav-link nav-link-animated text-black">
                            <i class="bi bi-envelope-fill"></i> info@muravendeghaz.hu
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mx-0 bg-secondary py-3">
            <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center">                
                    <ul class="list-unstyled d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-3 gap-md-4 mb-0">
                        <li><a class="nav-link" href="#">Főoldal</a></li>
                        <li><a class="nav-link" href="#">Szállásunk</a></li>
                        <li><a class="nav-link" href="#">Szolgáltatások</a></li>
                        <li><a class="nav-link" href="#">Környék</a></li>
                        <li><a class="nav-link" href="#">Galéria</a></li>
                        <li><a class="nav-link" href="#">Árak & Kapcsolat</a></li>
                    </ul>
            </div>
        </div>

        <div class="row mx-0 bg-primary align-items-center justify-content-center justify-content-md-between">
            <div class="col-12 col-md-6 d-flex flex-column flex-md-row justify-content-center justify-content-md-start gap-2 gap-md-4 py-2">
                <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">ÁSZF</a>
                <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">Impresszum</a>
                <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">Házirend</a>
            </div>
            <div class="col-12 col-md-6 text-white text-center text-md-end py-2">
                <p class="mb-0">&copy; {{ date('Y') }} Mura Vendégház. Minden jog fenntartva.</p>
            </div>
        </div>

    </div>
</footer>
</body>
</html>