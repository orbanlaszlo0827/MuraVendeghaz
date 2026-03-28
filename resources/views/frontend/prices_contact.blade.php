<x-frontend.layout>
    <div class="container-fluid p-3 p-lg-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card shadow-sm border-0 border-top border-4 border-black rounded-4 bg-white mb-5">
                    <div class="card-body p-4">
                        <h4 class="text-center fw-bold mb-4">Szállásdíjak (Felnőttek)</h4>
                        @foreach ($adultPrices as $adultPrice)

                            <div class="d-flex justify-content-between align-items-center border-bottom py-1 px-1 {{ $loop->last ? 'bg-black bg-opacity-10 rounded' : 'border-bottom mb-3' }}">
                                <div class="fs-5 {{ $adultPrice->title == '8+ fő' ? 'fw-bold' : ''   }}">
                                    <i class="bi {{ $adultPrice->title == '1 fő' ? 'bi-person' : ($adultPrice->title == '8+ fő' ? 'bi-people-fill' : 'bi-people') }} me-2"></i> 
                                    {{ $adultPrice->title == '8+ fő' ? 'Nagycsoportos (8+)' : $adultPrice->title }}
                                </div>
                                <div class="fs-5 {{ $adultPrice->title == '8+ fő' ? 'fw-bold' : ''   }}">
                                    {{ number_format($adultPrice->price_value, 0, ',', ' ') }} {{ $adultPrice->unit }}
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-sm border-0 border-top border-4 border-black rounded-4 bg-white">
                    <div class="card-body p-4">
                        <h4 class="text-center fw-bold mb-4">Fűtési felár</h4>
                        @foreach ($heatingPrices as $heatingPrice)

                            <div class="d-flex justify-content-between align-items-center border-bottom py-1 px-1 {{ $loop->last ? 'bg-black bg-opacity-10 rounded' : 'border-bottom mb-2' }}">
                                <div class="fs-5 {{ $heatingPrice->title == '3+ éjszaka' ? 'fw-bold' : '' }}">
                                    <i class="bi bi-fire me-2"></i> 
                                    {{ $heatingPrice->title == '3+ éjszaka' ? '3+ éjszakától' : $heatingPrice->title }}
                                </div>
                                <div class="fs-5 {{ $heatingPrice->title == '3+ éjszaka' ? 'fw-bold' : ''   }}">
                                    {{ number_format($heatingPrice->price_value, 0, ',', ' ') }} {{ $heatingPrice->unit }}
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center g-4">
            @foreach ($otherPrices as $otherPrice)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card shadow-sm border-0 border-top border-4 border-black rounded-4 bg-white h-100">
                    <div class="card-body d-flex flex-column p-4 justify-content-center text-center">
                        <div>
                            <span class="display-2 fw-bold">{{ $otherPrice->price_value }}</span>
                            <span class="fs-4 text-muted">{{ $otherPrice->unit_first }}</span>
                        </div>
                        <div>
                            <span class="fs-4 text-muted text-uppercase">{{ $otherPrice->unit_third ? '/' . $otherPrice->unit_second : 'per ' . $otherPrice->unit_second }}{{ $otherPrice->unit_third ? '/' . $otherPrice->unit_third : '' }}</span>
                        </div>
                        @if(array_key_exists($otherPrice->title, $priceDescriptions))
                            <div class="text-muted fw-bold mt-1">
                                {{ $otherPrice->title }}
                            </div>
                            <div class="text-muted small mt-1">
                                {{ $priceDescriptions[$otherPrice->title] }}
                            </div>
                        @endif
                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-frontend.layout>