<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
    
    <div class="row justify-content-center w-100">
        
        <div class="col-11 col-sm-8 col-md-6 col-lg-4">
            
            <div class="card shadow border-0 p-4">
                <h2 class="text-center mb-4">Bejelentkezés</h2>
                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Email"
                            value="{{ old('email') }}" 
                            required autofocus>
                        
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input class="form-control mb-3" type="password" name="password" placeholder="Jelszó">
                    <button type="submit" class="btn btn-primary w-100">Bejelentkezés</button>
                </form>
                
            </div>
            
        </div>
        
    </div>
</div>
</body>
</html>