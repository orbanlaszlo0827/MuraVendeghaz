<x-frontend.layout>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="mt-3" id="prices">
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
                    <div class="card shadow-sm border-0 border-top border-4 border-{{ $otherPrice->border_color }} rounded-4 bg-white h-100">
                        <div class="card-body d-flex flex-column p-4 justify-content-center text-center">
                            <div>
                                <span class="display-3 fw-bold">{{ $otherPrice->price_value }}</span>
                                <span class="fs-4 text-muted">{{ $otherPrice->unit_first }}</span>
                            </div>
                            <div>
                                <span class="fs-5 text-muted text-uppercase">
                                    {{ $otherPrice->unit_third ? '/' . $otherPrice->unit_second : 'per ' . $otherPrice->unit_second }}{{ $otherPrice->unit_third ? '/' . $otherPrice->unit_third : '' }}
                                </span>
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
    </section>

    <section class="mt-3" id="faq">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <h1>Gyakran feltett kérdések</h1>
                    <div class="accordion mb-4" id="accordionExample">
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Foglalási feltételek és Kiemelt időszakok
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-between align-items-center py-3 px-3 px-md-4 mb-3 border border-secondary border-opacity-25 rounded-3 shadow-sm">
                                        <div>
                                            <div class="text-muted mb-1"><i class="bi bi-calendar3 me-2"></i>Minimum foglalás:</div>
                                            <div class="fs-5 fw-bold text-dark">2 éjszaka</div>
                                        </div>
                                        
                                        <div class="text-end text-md-start">
                                            <div class="text-muted mb-1"><i class="bi bi-cup-hot me-2"></i>Ellátás:</div>
                                            <div class="fs-5 fw-bold text-dark">Önellátás</div>
                                        </div>
                                        
                                    </div>

                                    <div class="alert alert-warning border-0 rounded-3 mb-3" role="alert">
                                        <h6 class="alert-heading fw-bold mb-2"><i class="bi bi-info-circle me-2"></i>Egy éjszakás kaland?</h6>
                                        <p class="mb-0">1 éjszakás foglalás esetén <strong class="text-dark">25% felárat</strong> számolunk!</p>
                                    </div>

                                    <div class="py-3 px-4 border border-2 border-primary shadow rounded-3 mb-3">
                                        <h5 class="text-uppercase"><i class="bi bi-fire text-primary me-2"></i><strong>Kiemelt időszakok</strong><span class="text-muted fs-6 fw-normal ms-2">(Főszezon)</span></h5>
                                        <ul>
                                            <li>06.01. - 08.31. (Nyár)</li>
                                            <li>Szilveszter, hosszú hétvégék, helyi rendezvények</li>
                                        </ul>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold fs-5"><i class="bi bi-coin me-2 text-success"></i>Minimum ár:</span>
                                            <span class="fw-bold fs-4">60.000 Ft / éj</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold fs-5"><i class="bi bi-megaphone me-2 text-success"></i>Szabály:</span>
                                            <span class="fs-4">Csak <strong class="text-uppercase">egyben</strong> kivehető</span>
                                        </div>
                                    </div>
                                    <p class="text-muted fs-6 ms-2">*Az árak tájékoztató jellegűek. Ünnepnapokon és akciók esetén változhatnak. Foglalás: 50% előleggel.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Érkezés és Távozás (Check-in / Check-out)
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <div class="row g-lg-4">
                                        <div class="col-12 col-lg-6">
                                            <div class="bg-success bg-opacity-25 border border-2 border-success p-3 rounded-3 mb-3">
                                                <h6 class="fw-bold fs-5"><i class="bi bi-box-arrow-right me-2"></i>ÉRKEZÉS (Check-in)</h6>
                                                <p><strong class="fs-4 text-success">14:00</strong> -tól</p>
                                                <p class="m-0">(Az érkezés napján)</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="bg-primary bg-opacity-25 border border-2 border-primary p-3 rounded-3 mb-3">
                                                <h6 class="fw-bold fs-5"><i class="bi bi-box-arrow-left me-2"></i>TÁVOZÁS (Out)</h6>
                                                <p><strong class="fs-4 text-primary">10:00</strong> -ig</p>
                                                <p class="m-0">(Az távozás napján)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-black bg-opacity-10 p-4 rounded-3">
                                        <h5 class="fw-bold mb-3"><i class="bi bi-clock me-2"></i>Korábbi érkezés / Későbbi távozás?</h5>
                                        <p class="fs-5 mb-3">Előzetes egyeztetés alapján lehetséges.</p>
                                        <hr class="w-75 text-black mb-3">
                                        <p class="fs-5 mb-0">Díja: <span class="fw-bold fs-4">1.000 Ft</span> / fő / óra</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Ingyenes szolgáltatások (Mit tartalmaz az ár?)
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                        <i class="bi bi-gift-fill fs-4 me-3"></i>
                                        <div>
                                            <h5 class="alert-heading fw-bold mb-1">Nincsenek rejtett költségek!</h5>
                                            <p class="mb-0">Az alábbi szolgáltatások használata benne van az árban.</p>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        
                                        <div class="col-12 col-lg-6">
                                            <div class="bg-warning bg-opacity-25 p-4 rounded-3 h-100">
                                                <h5 class="fw-bold"><i class="ph ph-chef-hat me-2"></i>Kényelem & Konyha</h5>
                                                <hr class="text-warning">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Teljesen felszerelt konyhák (benti + kinti)</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Kemence, Grill, Bogrács (+ Tűzifa!)</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Mosógép & Mosogatógép</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Zárt parkoló & Wifi</span>
                                                    </li>
                                                    <li class="d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Bútorszéf</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-lg-6">
                                            <div class="bg-warning bg-opacity-25 p-4 rounded-3 h-100">
                                                <h5 class="fw-bold"><i class="bi bi-sun me-2"></i>Wellness & Család</h5>
                                                <hr class="text-warning">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span><strong>Kinti Medence</strong> (Jún - Aug)</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Ping-pong, Csocsó, Lengőteke</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Óriás trambulin (3m)</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Játszóvár & Gyerekjátékok</span>
                                                    </li>
                                                    <li class="d-flex align-items-baseline">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Bababarát eszközök (Kiságy, kád, szék)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Extra szolgáltatások és Egyéb tudnivalók
                            </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <div class="bg-success bg-opacity-10 p-3 p-md-4 rounded-3 mb-3 text-success">
                                        <h5 class="fw-bold mb-4"><i class="ph-bold ph-hand-coins me-2"></i>Térítés ellenében igénybe vehető</h5>
                                        
                                        <div class="mb-3">
                                            <div class="d-flex align-items-baseline mb-1">
                                                <i class="ph-bold ph-plus me-2 fs-5"></i>
                                                <span class="fw-bold fs-5 text-success">Szauna</span>
                                                <span class="ms-2">{{ number_format($extraPrices->get('szauna')?->price_value ?? 0, 0, ',', '.') }} {{ $extraPrices->get('Szauna')?->unit ?? 'Ft/óra' }}</span>
                                            </div>
                                            <div class="text-muted ms-4">(A felfűtéstől számítva)</div>
                                        </div>
                                        
                                        <hr class="text-success opacity-25 my-3">
                                        
                                        <div class="mb-3">
                                            <div class="d-flex align-items-baseline mb-1">
                                                <i class="ph-bold ph-cooking-pot me-2 fs-5"></i>
                                                <span class="fw-bold fs-5 text-success">Fazekas bemutató</span>
                                                <span class="ms-2">{{ number_format($extraPrices->get('fazekas')?->price_value ?? 0, 0, ',', '.') }} {{ $extraPrices->get('fazekas')?->unit ?? 'Ft/óra' }}</span>
                                            </div>
                                            <div class="text-muted ms-4">(Korongozás szakemberrel, anyaggal)</div>
                                        </div>
                                        
                                        <hr class="text-success opacity-25 my-3">
                                        
                                        <div>
                                            <div class="d-flex align-items-baseline">
                                                <i class="ph-bold ph-tent me-2 fs-5"></i>
                                                <span class="fw-bold fs-5 text-success">Sátrazás</span>
                                                <span class="ms-2">{{ number_format($extraPrices->get('sator')?->price_value ?? 0, 0, ',', '.') }} {{ $extraPrices->get('sator')?->unit ?? 'Ft/óra' }}</span>
                                            </div>
                                            <div class="text-muted ms-4">(Az udvaron)</div>
                                        </div>
                                    </div>

                                    <div class="bg-primary bg-opacity-10 p-3 p-md-4 rounded-3 mb-3 text-primary">
                                        <h5 class="fw-bold mb-2"><i class="ph-bold ph-paw-print me-2"></i>Háziállat</h5>
                                        <div class="fs-5">
                                            <span class="fw-bold text-dark">Hozható!</span> (Előzetes egyeztetéssel)
                                        </div>
                                    </div>

                                    <div class="bg-secondary bg-opacity-10 p-3 p-md-4 rounded-3 mb-3 text-dark">
                                        <h5 class="fw-bold mb-2"><i class="ph-bold ph-thermometer me-2"></i>Hűtés-fűtés</h5>
                                        <div class="fs-5">
                                            A Házigazda gondoskodik róla igény szerint.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Foglalás menete és Fizetés
                            </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                   <div>
                                        <div class="bg-warning bg-opacity-10 text-dark p-3 p-md-4 rounded-3 mb-4 d-flex flex-column flex-md-row align-items-center justify-content-between text-center gap-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ph-bold ph-number-circle-one text-warning me-2 fs-4"></i>
                                                <span class="lh-sm text-start">Írásos jelzés/<br>foglalás az oldalon</span>
                                            </div>

                                            <i class="ph-bold ph-caret-right text-warning fs-4 d-none d-md-block"></i>
                                            <i class="ph-bold ph-caret-down text-warning fs-4 d-md-none"></i>

                                            <div class="d-flex align-items-center">
                                                <i class="ph-bold ph-number-circle-two text-warning me-2 fs-4"></i>
                                                <span>Visszaigazolás</span>
                                            </div>

                                            <i class="ph-bold ph-caret-right text-warning fs-4 d-none d-md-block"></i>
                                            <i class="ph-bold ph-caret-down text-warning fs-4 d-md-none"></i>

                                            <div class="d-flex align-items-center">
                                                <i class="ph-bold ph-number-circle-three text-warning me-2 fs-4"></i>
                                                <span>Előleg</span>
                                            </div>
                                        </div>

                                        <div class="border border-success text-success p-4 rounded-2 mb-4">
                                            <div class="row mb-2 fs-5">
                                                <div class="col-12 col-md-5 col-lg-6 text-lg-center">Kedvezményezett:</div>
                                                <div class="col-12 col-md-7 col-lg-6 text-dark text-lg-center">Orbán László</div>
                                            </div>
                                            <div class="row mb-2 fs-5">
                                                <div class="col-12 col-md-5 col-lg-6 text-lg-center">Bank:</div>
                                                <div class="col-12 col-md-7 col-lg-6 text-dark text-lg-center">OTP Bank</div>
                                            </div>
                                            <div class="row mb-2 fs-5">
                                                <div class="col-12 col-md-5 col-lg-6 text-lg-center">Számlaszám:</div>
                                                <div class="col-12 col-md-7 col-lg-6 text-dark text-lg-center">11773494-13120603</div>
                                            </div>
                                            <div class="row fs-5">
                                                <div class="col-12 col-md-5 col-lg-6 text-lg-center">Közlemény:</div>
                                                <div class="col-12 col-md-7 col-lg-6 text-dark text-lg-center">Név + Dátum</div>
                                            </div>
                                        </div>

                                        <hr class="text-secondary opacity-25 mb-4">

                                        <div class="text-warning fs-5 text-center d-flex align-items-center justify-content-center">
                                            <i class="ph-bold ph-warning-circle me-2 fs-4"></i>
                                            <span>Az előleg összegét a foglalás garantálásához kérjük.</span>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Lemondási feltételek (Kötbér)
                            </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <p class="fs-5 mb-4 text-dark">
                                        Lemondás módja: Kizárólag <strong class="text-black">írásban</strong> vagy <strong class="text-black">személyesen</strong>.
                                    </p>

                                    <div class="bg-secondary bg-opacity-10 p-3 p-md-4 rounded-4 mb-4">
                                        
                                        <div class="row align-items-center mb-3 fs-5">
                                            <div class="col-5 col-md-4">
                                                <i class="ph-fill ph-circle text-success me-2"></i>30 napon túl:
                                            </div>
                                            <div class="col-7 col-md-8 text-dark">
                                                INGYENES (kivéve admin díj)
                                            </div>
                                        </div>

                                        <div class="row align-items-center mb-3 fs-5">
                                            <div class="col-5 col-md-4">
                                                <i class="ph-fill ph-circle text-warning me-2"></i>29-15 nap:
                                            </div>
                                            <div class="col-7 col-md-8 text-dark">
                                                1 éjszaka ára
                                            </div>
                                        </div>

                                        <div class="row align-items-center mb-3 fs-5">
                                            <div class="col-5 col-md-4">
                                                <i class="ph-fill ph-circle me-2 orangeColor"></i>14-3 nap:
                                            </div>
                                            <div class="col-7 col-md-8 text-dark">
                                                2 éjszaka ára
                                            </div>
                                        </div>

                                        <div class="row align-items-center fs-5">
                                            <div class="col-5 col-md-4">
                                                <i class="ph-fill ph-circle text-danger me-2"></i>3 napon belül:
                                            </div>
                                            <div class="col-7 col-md-8 text-dark">
                                                3 éjszaka ára
                                            </div>
                                        </div>

                                    </div>

                                    <div class="border border-secondary border-opacity-50 p-3 p-md-4 rounded-3 text-dark">
                                        <h5 class="fw-bold mb-2">Utazás megszakítása:</h5>
                                        <div class="fs-5">
                                            Ténylegesen eltöltött éjek + 3 éjszaka kötbér.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Kaució és Házirend
                            </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <div class="border border-secondary border-opacity-50 bg-secondary bg-opacity-10 p-3 p-md-4 rounded-3 mb-4 text-dark">
    
                                        <div class="fs-5 mb-4">
                                            KAUCIÓ: <span class="fw-bold fs-4 ms-1">20.000 Ft</span>
                                        </div>
                                        
                                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center fs-5">
                                            <div class="mb-2 mb-sm-0">Fizetés: <strong class="text-black">Érkezéskor</strong></div>
                                            
                                            <div class="d-none d-sm-block text-primary opacity-50">|</div>
                                            
                                            <div>Visszajár: <strong class="text-black">Távozáskor</strong></div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="border border-success bg-success bg-opacity-10 text-success p-3 rounded-3 text-center h-100 d-flex flex-column justify-content-center">
                                                <div class="mb-1">Károkozás:</div>
                                                <div class="fw-bold fs-5">Helyszínen térítendő</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="border border-primary bg-primary bg-opacity-10 text-primary p-3 rounded-3 text-center h-100 d-flex flex-column justify-content-center">
                                                <div class="mb-1">Háziállat:</div>
                                                <div class="fw-bold fs-5">Hozható</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="border p-3 rounded-3 text-center h-100 d-flex flex-column justify-content-center orangeBox">
                                                <div class="mb-1">Átadás:</div>
                                                <div class="fw-bold fs-5">Rendeltetésszerűen</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="border p-3 rounded-3 text-center h-100 d-flex flex-column justify-content-center purpleBox">
                                                <div class="mb-1">Takarítás:</div>
                                                <div class="fw-bold fs-5">Az ár tartalmazza</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                            <button class="accordion-button rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Garancia és Vis Maior
                            </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <hr class="mx-3 my-0">
                                <div class="accordion-body">
                                    <div class="bg-secondary bg-opacity-10 p-3 p-md-4 rounded-3 text-dark mb-3">
                                        <div>
                                            <h5 class="fw-bold mb-2 d-flex align-items-center">
                                                <i class="ph ph-shield me-2 fs-4"></i>Szállásadó garanciája:
                                            </h5>
                                            <p class="fs-5 mb-0">
                                                Kitakarított ház, működő eszközök, azonnali javítás.
                                            </p>
                                        </div>

                                        <hr class="text-primary opacity-50 my-4">

                                        <div>
                                            <h5 class="fw-bold mb-2 d-flex align-items-center">
                                                <i class="ph ph-cloud-lightning me-2 fs-4"></i>Vis Maior esetek:
                                            </h5>
                                            <p class="fs-5 mb-0">
                                                Nincs kártérítés (időjárás, sztrájk, katasztrófa).
                                            </p>
                                        </div>

                                        <hr class="text-primary opacity-50 my-4">

                                        <div>
                                            <h5 class="fw-bold mb-2 d-flex align-items-center">
                                                <i class="ph ph-user-square me-2 fs-4"></i>Szállásadó lemondása:
                                            </h5>
                                            <p class="fs-5 mb-0">
                                                Előleg visszafizetése (kivéve Vis Maior).
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5" id="contact">
        <div class="container">
            <div class="row g-4 align-items-stretch"> 
                <div class="col-12 col-xl-6">
                    <div class="p-4 p-lg-5 bg-white shadow rounded-4 h-100 d-flex flex-column justify-content-center border-0 border-start border-4 border-dark">
                        
                        <div class="text-center text-lg-start"> 
                            <h2 class="mb-4 fw-bold"><i class="ph ph-phone-disconnect me-2 text-primary"></i>Kérdése van a foglalás előtt?</h2>
                            
                            <p class="fs-5 mb-5 text-muted">Hívjon minket bátran, vagy írjon üzenetet az űrlapon keresztül, szívesen segítünk eligazodni!</p>
                            
                            <div class="bg-light rounded-3 p-4 mb-5 shadow-sm border">
                                <p class="fs-3 fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-lg-start">
                                    <i class="bi bi-telephone me-3 text-primary"></i>
                                    <a href="tel:{{ str_replace(' ', '', $settings['contact_phone']) }}" class="text-dark text-decoration-none">
                                        {{ $settings['contact_phone'] }}
                                    </a>
                                </p>
                                <p class="fs-4 fw-bold mb-0 d-flex align-items-center justify-content-center justify-content-lg-start text-break">
                                    <i class="bi bi-envelope me-3 text-primary"></i>
                                    <a href="mailto:{{ $settings['contact_email'] }}" class="text-primary text-decoration-none">
                                        {{ $settings['contact_email'] }}
                                    </a>
                                </p>
                            </div>
                            
                            <div class="d-flex align-items-center justify-content-center justify-content-lg-start text-muted">
                                <i class="bi bi-clock me-2"></i>
                                <p class="fs-6 m-0">Elérhetőek vagyunk minden nap 08:00 és 20:00 között.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-xl-6">
                    <div class="card border-0 shadow-lg rounded-4 bg-white h-100">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="fw-bold mb-4">Írjon nekünk!</h3>
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Teljes név</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-lg bg-light border-0" placeholder="Mura Péter" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">E-mail cím</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg bg-light border-0" placeholder="murapeter@email.hu" required>
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="form-label fw-bold">Üzenet</label>
                                    <textarea name="message" id="message" rows="6" class="form-control bg-light border-0" placeholder="Miben segíthetünk?" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold rounded-3 py-3 shadow-sm hover-lift">
                                    Üzenet küldése <i class="bi bi-send ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <x-frontend.cta />
</x-frontend.layout>