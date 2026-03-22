<x-admin.layout>
    @section('title', 'Árak Szerkesztése')

    <form action="{{ route('admin.prices.updateAll') }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="row p-3">
            @foreach($prices as $price)
                @if (!in_array($price->category, $categories)) 
                    <h3 class="mb-4">{{ $price->category }}</h3>
                    @php $categories[] = $price->category; @endphp
                
                @endif
                <div class="col-lg-4 col-sm-6 mb-3">
                    <div class="card p-3 bg-white">
                        <div class="card-title fw-medium">{{ $price->title }}</div>
                        
                        <div class="input-group">
                            <input step="500" min="0" type="number" 
                                name="prices[{{ $price->id }}][price_value]" 
                                class="form-control bg-black bg-opacity-10" 
                                value="{{ $price->price_value }}">
                            
                            <span class="input-group-text">{{ $price->unit }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-success mt-3">Összes ár mentése</button>
        </div>

    </form>
    
    <hr class="my-5">
    <form action="{{ route('admin.settings.updateAll') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row p-3">
            <h3 class="mb-4">Globális Rendszerbeállítások</h3>
            @foreach($settings as $setting)
                <div class="col-md-6 mb-3">
                    <div class="card p-3 h-100 bg-white">
                        <div class="card-title fw-medium border-0 pb-2">{{ $setting->description }}</div>
                        
                        <div class="card-body p-0">
                            @if ($setting->value == '1' || $setting->value == '0')
                                <select name="settings[{{ $setting->key }}]" class="form-control bg-black bg-opacity-10">
                                    <option value="1" {{ $setting->value == '1' ? 'selected' : '' }}>Bekapcsolva (Igen)</option>
                                    <option value="0" {{ $setting->value == '0' ? 'selected' : '' }}>Kikapcsolva (Nem)</option>
                                </select>
                            @else
                                <input class="form-control bg-black bg-opacity-10" type="text"
                                name="settings[{{ $setting->key }}]" 
                                value="{{ $setting->value }}">
                            @endif
                        </div>
                        
                        <small class="text-muted mt-2">Technikai kulcs: <code>{{ $setting->key }}</code></small>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-success mt-3">Beállítások mentése</button>
        </div>

    </form>
</x-admin.layout>