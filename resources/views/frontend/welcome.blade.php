<x-frontend.layout heroImage="landing_page/hero.jpg" heroTitle="Pihenés és Élmények Murakeresztúron">
    <x-frontend.introduction>
        <p class="lead m-0">Keresi a tökéletes búvóhelyet, ahol a természet közelsége és a modern kényelem összeér? Vendégházunk a Mura-vidék szívében, csendes környezetben várja azokat, akik kiszakadnának a mindennapok rohanásából. Legyen szó családi pihenésről vagy baráti kikapcsolódásról, nálunk minden adott egy felejthetetlen élményhez.</p>
    </x-frontend.introduction>
    <section class="mt-3" id="zigzag">

        <div class="container-fluid p-0">
            
            <div class="row g-0">
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center p-4 p-md-5 order-1 order-lg-2 bg-white">
                    <h2 class="mb-5 fw-bold">Forró pillanatok a hűvös estéken</h2>
                    <p class="lead mb-5 ta-justify">Adja át magát a teljes relaxációnak finn szaunánkban! Egy hosszú túra, kerékpározás vagy vízi kaland után nincs is jobb érzés, mint feltöltődni, ellazítani a fáradt izmokat és megtisztítani a testet a forróságban. A tökéletes wellness élmény csak egy lépésre van a szobájától.</p>
                    <a href="{{ route('services') }}" class="btn btn-primary w-50 fw-bold fs-3">Tudjon meg többet <i class="bi bi-arrow-right"></i></a>
                </div>
                
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <img src="{{ asset('images/landing_page/szauna.jpg') }}" alt="Forró pillanatok a hűvös estéken" class="img-fluid w-100 zigzag-image">
                </div>
            </div>

            <div class="row g-0">   
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center p-4 p-md-5 bg-white">
                    <h2 class="mb-5 fw-bold">Pihentető alvás, háborítatlan nyugalom</h2>
                    <p class="lead mb-5 ta-justify">Kényelmes, prémium matracokkal felszerelt franciaágyaink és a természet lágy közelsége garantálják, hogy minden reggel frissen és energiával telve ébredjen. Sötétítővel és szúnyoghálóval felszerelt, kellemesen hűvös szobáinkban a legnagyobb nyári melegben is csak a madárcsicsergés ébresztheti.</p>
                    <a href="{{ route('rooms') }}" class="btn btn-primary w-50 fw-bold fs-3">Tudjon meg többet <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{ asset('images/landing_page/haloszoba.jpg') }}" alt="Pihentető alvás, háborítatlan nyugalom" class="img-fluid w-100 zigzag-image">
                </div>
            </div>

            <div class="row g-0">
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center p-4 p-md-5 order-1 order-lg-2 bg-white">
                    <h2 class="mb-5 fw-bold">Szórakozás kompromisszumok nélkül</h2>
                    <p class="lead mb-5 ta-justify">A tágas garázst egy igazi, minden igényt kielégítő közösségi játéktérré alakítottuk! Pingpong, csocsó és darts várja a baráti társaságokat és családokat egy jó hangulatú esti bajnokságra. A beépített hűtőnek és konyhapultnak köszönhetően a frissítőkért sem kell messzire menni.</p>
                    <a href="{{ route('services') }}" class="btn btn-primary w-50 fw-bold fs-3">Tudjon meg többet <i class="bi bi-arrow-right"></i></a>
                </div>
                
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <img src="{{ asset('images/landing_page/garazs.png') }}" alt="Szórakozás kompromisszumok nélkül" class="img-fluid w-100 zigzag-image">
                </div>
            </div>

        </div>
    </section>

    <section class="mt-5 pt-lg-5" id="icons" style="--bg-image: url('{{ asset('images/landing_page/icons.jpg') }}');">
        <div class="container-fluid p-0">
            <div class="w-100 parallax-window"></div>
        </div>
        
        <div class="container-fluid py-5 bg-white">
            
            <div class="container">
                <div class="row g-4 py-4">
                    
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-car-front-fill me-3"></i>Zárt parkoló a helyszínen</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-heart-fill me-3"></i>Kutyabarát szálláshely</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-house-door-fill me-3"></i>35 m²-es privát élettér</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-wifi me-3"></i>Klíma és Ingyenes WiFi</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-water me-3"></i>Privát szauna és medence</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-fire me-3"></i>Nyári konyha & kerti kemence</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-controller me-3"></i>Csocsó, darts és pingpong</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <p class=" rounded-3 py-4 px-3 mb-0 bg-light bg-opacity-50 fs-4 h-100 shadow-sm"><i class="bi bi-star-fill me-3"></i>Udvari játszóvár gyerekeknek</p>
                    </div>

                </div>
            </div>
            
        </div>
    </section>

    <section id="reviews" class="py-4 mt-4 my-lg-5 py-lg-5">
        <div class="container my-lg-5">
            <div class="row g-4">
                <div class="col-12 col-lg-4">
                    <div class="card bg-white h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                            
                            <div class="d-flex align-items-center mb-2">
                                <h1 class="card-title display-3 fw-bolder mb-0 text-dark">98%</h1>
                                <span class="text-primary display-6 fw-bold ms-2 align-top">+</span>
                            </div>
                            <div>
                                <h5 class="text-uppercase text-primary fw-semibold mb-3 review-subtitle">
                                    Pozitív visszajelzés
                                </h5>
                                
                                <p class="card-text text-muted mb-0 lh-17">
                                    Az elégedett vendégek több mint 98%-a pozitív visszajelzést adott, ami tükrözi elkötelezettségünket a kivételes szolgáltatás és az emlékezetes tartózkodás iránt.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card bg-white h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                            
                            <div class="d-flex align-items-center mb-2">
                                <h1 class="card-title display-3 fw-bolder mb-0 text-dark">15</h1>
                                <span class="text-primary display-6 fw-bold ms-2 align-top">+</span>
                            </div>
                            <div>
                                <h5 class="text-uppercase text-primary fw-semibold mb-3 review-subtitle">
                                    Év tapasztalat
                                </h5>
                                
                                <p class="card-text text-muted mb-0 lh-17">
                                    15 éves iparági tapasztalatunknak köszönhetően minden tartózkodást zökkenőmentes élménnyé varázsolunk.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card bg-white h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                            
                            <div class="d-flex align-items-center mb-2">
                                <h1 class="card-title display-3 fw-bolder mb-0 text-dark">5K</h1>
                                <span class="text-primary display-6 fw-bold ms-2 align-top">+</span>
                            </div>
                            <div>
                                <h5 class="text-uppercase text-primary fw-semibold mb-3 review-subtitle">
                                    Elégedett vendég
                                </h5>
                                
                                <p class="card-text text-muted mb-0 lh-17">
                                    Büszkén szolgáljuk ki az 5000+ elégedett vendéget, akik ránk bízták, hogy biztosítsuk számukra a tökéletes szállást.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-frontend.cta />
</x-frontend.layout>