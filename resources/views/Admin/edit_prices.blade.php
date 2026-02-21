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
<hr class="my-5">
<h3 class="mb-4">Globális Rendszerbeállítások</h3>

<form action="{{ route('admin.settings.updateAll') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        @foreach($settings as $setting)
            <div class="col-md-6 mb-3">
                <div class="card p-3 h-100">
                    <label class="form-label font-weight-bold">{{ $setting->description }}</label>
                    
                    
                        @if ($setting->value == '1' || $setting->value == '0')
                            <select name="settings[{{ $setting->key }}]" class="form-control">
                                <option value="1" {{ $setting->value == '1' ? 'selected' : '' }}>Bekapcsolva (Igen)</option>
                                <option value="0" {{ $setting->value == '0' ? 'selected' : '' }}>Kikapcsolva (Nem)</option>
                            </select>
                        @else
                            <input type="text"
                            name="settings[{{ $setting->key }}]" 
                            value="{{ $setting->value }}">
                        @endif
                    
                    
                    <small class="text-muted mt-2">Technikai kulcs: <code>{{ $setting->key }}</code></small>
                </div>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-warning mt-3">Beállítások mentése</button>
</form>
</body>
</html>