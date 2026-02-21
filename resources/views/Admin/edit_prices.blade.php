<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Bootstrap Teszt</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>

<form action="{{ route('admin.prices.updateAll') }}" method="POST">
    @csrf
    @method('PUT') 
    <div class="row">
        @foreach($prices as $price)
            <div class="col-md-6 mb-3">
                <div class="card p-3">
                    <label class="form-label font-weight-bold">{{ $price->title }}</label>
                    
                    <div class="input-group">
                        <input type="number" 
                               name="prices[{{ $price->id }}][price_value]" 
                               class="form-control" 
                               value="{{ $price->price_value }}">
                        
                        <span class="input-group-text">{{ $price->unit }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-success mt-3">Összes ár mentése</button>
</form>
</body>
</html>