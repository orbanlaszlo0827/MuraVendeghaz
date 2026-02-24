<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Bootstrap Teszt</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Mura Vendégház</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h1 class="display-4 text-primary">Cím</h1>
                <p class="lead">Tartalom</p>
                <button class="btn btn-success btn-lg">Gomb</button>
            </div>
        </div>
    </div>

</body>
</html>