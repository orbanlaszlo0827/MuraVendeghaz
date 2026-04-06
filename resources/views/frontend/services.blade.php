<x-frontend.layout heroImage="services/hero.jpg" heroTitle="Fedezze fel szolgáltatásainkat!">
    @section('title', 'Szolgáltatások')
    <x-frontend.introduction>
        <p class="lead m-0">Vendégházunk különlegessége a hatalmas, zárt udvar, ahol minden korosztály megtalálja a számítását. Legyen szó egy nagy bográcsozásról, medencés partiról vagy egy családi pingpong bajnokságról, itt minden adott a tökéletes kikapcsolódáshoz.</p>
    </x-frontend.introduction>

    <section class="py-5 bg-light" id="Garage">
        <div class="container py-4">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden mx-auto featurePanel">
                
                <img src="{{ asset('images/services/garazs.png') }}" alt="Garázs és Játéktér" class="w-100">
                
                <div class="card-body p-4 p-md-5 bg-white">
                    
                    <h2 class="fw-bold mb-4 text-center text-md-start">Garázs és Játéktér</h2>
                    <p class="text-muted fs-5 mb-5 text-center text-md-start">Egy hely, ahol a szórakozás és a praktikum találkozik. Tökéletes helyszín az esti meccsekhez vagy a közös főzések előkészítéséhez.</p>

                    <div class="row g-4 g-md-5">
                        
                        <div class="col-12 col-md-6">
                            <h6 class="fw-bold text-uppercase text-muted mb-4 tracking-wide">Játék & Szórakozás</h6>
                            
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                <li class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-controller fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Csocsó</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-circle-half fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Pingpong</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-bullseye fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Darts</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-cone fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Lengőteke</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-6">
                            <h6 class="fw-bold text-uppercase text-muted mb-4">Felszereltség</h6>
                            
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                <li class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-cup-hot fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Konyhapult</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-snow fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Hűtőszekrény</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-soundwave fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Mikrohullámú sütő</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-archive fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Sütő, gáztűzhely</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex justify-content-center align-items-center me-3 areaIcons">
                                        <i class="bi bi-droplet fs-5"></i>
                                    </div>
                                    <span class="fs-5 fw-medium">Mosogatógép</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
            
        </div>
    </section>

    <section class="py-5" id="wellness">
        <div class="container py-4">
            
            <h2 class="fw-bold mb-5 text-center">Kültéri wellness és kikapcsolódás</h2>

            <div class="row g-3 g-md-4 align-items-stretch">
                
                <div class="col-12 col-lg-8">
                    <img src="{{ asset('images/services/medence.jpg') }}" alt="Kültéri medence" class="w-100 h-100 rounded-4 shadow-sm serviceGridBig">
                </div>

                <div class="col-12 col-lg-4 d-flex flex-column gap-3 gap-md-4">
                    
                    <div class="grow">
                        <img src="{{ asset('images/services/szauna.jpg') }}" alt="Szauna" class="w-100 h-100 rounded-4 shadow-sm serviceGridSmall">
                    </div>
                    
                    <div class="grow">
                        <img src="{{ asset('images/services/szauna2.jpg') }}" alt="Szauna" class="w-100 h-100 rounded-4 shadow-sm serviceGridSmall">
                    </div>

                </div>

            </div>

        </div>
    </section>

    <section class="py-5 bg-light" id="moreServices">
        <div class="container py-4">
            
            <h2 class="fw-bold mb-5 text-center">További élmények a kertben</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 align-items-stretch">
                
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                        <img src="{{ asset('images/services/fazekas.jpg') }}" alt="Fazekas bemutató" class="card-img-top w-100 moreServiceImage">
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-3">Fazekas bemutató</h4>
                            <p class="text-muted fs-6 mb-0">
                                Ismerkedjen meg a hagyományos fazekasmesterséggel! Szakember iránymutatásával akár a korongozást is kipróbálhatja, és elkészítheti saját kerámia emlékét.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                        <img src="{{ asset('images/services/jatszoter.jpg') }}" alt="Játszóvár" class="card-img-top w-100 moreServiceImage">
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-3">Játszóvár gyerekeknek</h4>
                            <p class="text-muted fs-6 mb-0">
                                Biztonságos és izgalmas szabadtéri játszóvár csúszdával és mászókával, ahol a legkisebbek is önfeledten szórakozhatnak a friss levegőn a zárt udvarban.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                        <img src="{{ asset('images/services/kemence.jpg') }}" alt="Kemence és Sütögető" class="card-img-top w-100 moreServiceImage">
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-3">Kemence és sütögető</h4>
                            <p class="text-muted fs-6 mb-0">
                                Készítsen ropogós sülteket, pizzát, vagy hagyományos bográcsos ételeket a teljesen felszerelt, fedett szabadtéri sütögető helyünkön, bármilyen időjárás esetén.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <x-frontend.cta/>
</x-frontend.layout>