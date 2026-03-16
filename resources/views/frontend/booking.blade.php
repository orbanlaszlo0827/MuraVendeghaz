<x-frontend.layout>
    <div class="position-relative w-100">      
        <img src="{{ asset('images/booking_page/hero.jpg') }}" alt="Foglalás" class="w-100 booking-hero-image">
        
        <div class="position-absolute top-0 inset-s-0 w-100 h-100 d-flex justify-content-center align-items-center">
            
            <div class="bg-dark bg-opacity-75 px-4 py-3 rounded text-center shadow">
                <h1 class="text-white fw-bold mb-0 display-3 ls-2">Foglalás</h1>
            </div>
        </div>
    </div>

    <form action="" method="POST">
        @csrf
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-xl-8 mb-3 mb-xl-0">
                    <div class="bg-white rounded-3 border mb-4">
                        <div class="bg-primary text-white px-3 py-3 rounded-top">
                            <h1 class="m-0">Foglalás részletei</h1>
                        </div>
                        <div class="p-4">
                            <div>
                                <div class="mb-4">
                                    <label class="form-label fs-4">Mikor szeretnétek jönni?</label>
                                    <input type="text" id="dateRange" name="dates" class="form-control form-control-lg bg-black bg-opacity-10" placeholder="Válasszon érkezési és távozási dátumot..." readonly>
                                </div>
                                <div class="d-flex flex-column flex-lg-row justify-content-between mb-4 gap-3">
                                    <div class="w-100">
                                        <label class="form-label fs-4">Felnőttek száma</label>
                                        <input type="number" class="form-control text-center bg-black bg-opacity-10 fs-4" name="adults" value="1" min="1" required>
                                    </div>
                                    <div class="w-100">
                                        <label class="form-label fs-4">Gyermekek száma</label>
                                        <input type="number" class="form-control text-center bg-black bg-opacity-10 fs-4" name="children" value="0" min="0" required>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h2 class="mb-3">Kényelmi szolgáltatások</h2>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <label class="form-label mb-1 fs-4">Fűtés igénylése</label>
                                            @if($forcedHeating)
                                                <p class="text-danger mb-0 fs-5 fw-bold">Kötelező fűtési szezon aktív</p>
                                            @else
                                                <p class="text-muted mb-0 fs-5">Szezonális felár, időtartamtól függ</p>
                                            @endif
                                        </div>
                                        
                                        <div class="form-check form-switch fs-3 mb-0">
                                            <input class="form-check-input shadow-none" type="checkbox" role="switch" id="futesSwitch" name="heating" value="1" 
                                                @if($forcedHeating) checked disabled @endif>
                                        </div>
                                    </div>

                                    @if($acEnabled)
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <label class="form-label mb-1 fs-4">Légkondicionálás</label>
                                                <p class="text-muted mb-0 fs-5">Hűtés és komfort (+2.000 Ft/nap)</p>
                                            </div>
                                            
                                            <div class="form-check form-switch fs-3 mb-0">
                                                <input class="form-check-input shadow-none" type="checkbox" role="switch" id="klimaSwitch" name="climate" value="1">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3 border">
                        <div class="bg-primary text-white px-3 py-3 rounded-top">
                            <h1 class="m-0">Személyes adatok</h1>
                        </div>
                        <div class="p-4">
                            <div class="d-flex flex-column flex-lg-row gap-lg-3">
                                <div class="mb-3 w-100">
                                    <label class="form-label fs-4">Teljes név <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-black bg-opacity-10 fs-4" placeholder="Kovács János" name="name" required>
                                    <div class="invalid-feedback fs-6">Kérjük, adja meg a teljes nevét (min. 4 karakter)!</div>
                                </div>
                                <div class="mb-3 w-100">
                                    <label class="form-label fs-4">Telefonszám <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-black bg-opacity-10 fs-4" placeholder="+36301234567" name="phone" required>
                                    <div class="invalid-feedback fs-6">Kérjük, adjon meg egy érvényes telefonszámot!</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-4">Email cím <span class="text-danger">*</span></label>
                                <input type="email" class="form-control bg-black bg-opacity-10 fs-4" placeholder="kovacsjanos@email.com" name="email" required>
                                <div class="invalid-feedback fs-6">Kérjük, adjon meg egy érvényes e-mail címet!</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-4">Megjegyzés / Különleges kérés</label>
                                <textarea class="form-control bg-black bg-opacity-10 fs-4" rows="3" placeholder="Érkezés várható ideje, etetőszék igény..." name="comment"></textarea>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="protectionCheck">
                                <label class="form-check-label">
                                    Kijelentem, hogy elolvastam és elfogadom az Adatkezelési Tájékoztatót és a Házirendet.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="bg-white rounded-3 border sticky-top sticky-prices">
                        <div class="bg-primary text-white px-3 py-3 rounded-top">
                            <h3 class="m-0">Foglalás összesítése</h3>
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted fs-4">Időtartam</span>
                                <span class="fw-bold fs-4"><span id="summary-nights">0</span> éjszaka</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-2 px-2 bg-black bg-opacity-10 rounded-3">
                                <span class="text-muted fs-4" id="summary-start-date">Érkezés</span>
                                <span class="text-muted fs-4">-></span>
                                <span class="text-muted fs-4" id="summary-end-date">Távozás</span>
                            </div>
                            
                            <hr>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted fs-4">Szállásdíj <small class="fs-6">(<span id="summary-adult-count">1</span> felnőtt)</small></span>
                                <span class="fw-bold fs-4"><span id="summary-adult-price">0</span> Ft</span>
                            </div>
                            
                            <div id="summary-child-row" class="d-none justify-content-between align-items-center mb-2">
                                <span class="text-muted fs-4">Gyermek ár <small class="fs-6">(<span id="summary-child-count">0</span> fő)</small></span>
                                <span class="fw-bold fs-4"><span id="summary-child-price">0</span> Ft</span>
                            </div>
                            
                            <div id="summary-heating-row" class="d-none justify-content-between align-items-center mb-2">
                                <span class="text-muted fs-4">Fűtés díja <small class="fs-6">(<span id="summary-heating-nights">0</span> éj)</small></span>
                                <span class="fw-bold fs-4"><span id="summary-heating-price">0</span> Ft</span>
                            </div>

                            <div id="summary-ac-row" class="d-none justify-content-between align-items-center mb-2">
                                <span class="text-muted fs-4">Klíma díja <small class="fs-6">(<span id="summary-ac-nights">0</span> nap)</small></span>
                                <span class="fw-bold fs-4"><span id="summary-ac-price">0</span> Ft</span>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted fs-4">Végösszeg</span>
                                <span class="fw-bold fs-2 text-primary"><span id="summary-total-price">0</span> Ft</span>
                            </div>

                            <button type="submit" id="submit-booking-btn" class="btn btn-success w-100 fw-bold fs-2 mt-3" disabled>
                                Foglalás véglegesítése
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-frontend.layout>