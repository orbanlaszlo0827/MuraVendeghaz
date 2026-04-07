<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gratulálunk, sikeres foglalás!</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-1">
        <div class="row f-flex flex-column justify-content-center mb-3">
            <div class="col text-center">
                <i class="bi bi-check-circle-fill icon-giant-check d-block text-success my-1 my-md-3"></i>

                <h3>Köszönjük! Foglalási igényét rögzítettük.</h3>
                <p>Küldtünk egy visszaigazoló e-mailt a megadott címre a további teendőkkel és az utalási adatokkal.</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center mb-3">
            <div class="col-12 col-lg-4 text-center">
                <h4><i class="bi bi-envelope me-2"></i>Nem találja a levelet?</h4>
                <p>Kérjük, ellenőrizze a <b>SPAM / Promóciók</b> mappát is!</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center mb-3">
            <div class="col-12 col-lg-4 text-center">
                <h5><b>Mi történik most?</b></h5>
                <hr>
                <ol>
                    <li>E-mail ellenőrzése</li>
                    <li>Előleg (50%) átutalása</li>
                    <li>Foglalás véglegesítése (Garantált)</li>
                </ol>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-4 text-center d-flex flex-column gap-3">
                <a class="btn btn-success py-2 fs-4 text-white" href="{{ route('home') }}">Vissza a főoldalra</a>
                <a href="{{ route('gallery') }}">Galéria megtekintése</a>
            </div>
        </div>
    </div>
</body>
</html>