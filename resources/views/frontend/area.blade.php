<x-frontend.layout heroImage="area/hero.jpg" heroTitle="A Mura ölelése">
    <x-frontend.introduction>
        <p class="lead m-0">A vendégház két összenyitható, de szeparálható lakrészből áll, összesen 3 hálószobával és 2 fürdőszobával. Ideális elosztás nagycsaládoknak vagy baráti társaságoknak, akik együtt szeretnének lenni, de igénylik a privát szférát is. Teljes kapacitás: 10 fő (fix ágyakon) + 2 fő pótágyon.</p>
    </x-frontend.introduction>
    <section class="mt-4" id="area">
        <div class="container py-4">
            <div class="row g-2">
                
                <div class="col-12 col-lg-6">
                    <div class="row g-2 h-100">
                        
                        <div class="col-5">
                            <img src="{{ asset('images/area/gridTemplom.jpg') }}" class="rounded-3 w-100 h-100 obj-fit" alt="Templom">
                        </div>
                        
                        <div class="col-7 d-flex flex-column gap-2 h-100">
                            
                            <div class="position-relative grow">
                                <img src="{{ asset('images/area/gridMura.jpg') }}" class="rounded-3 w-100 h-100 obj-fit" alt="Folyó">
                                <div class="position-absolute top-0 inset-s-0 inset-e-0 bottom-0 d-flex justify-content-center align-items-center p-2 text-center">
                                    <span class="overlay-text text-white">
                                        CSEND ÉS NYUGALOM
                                    </span>
                                </div>
                            </div>
                            
                            <div class="grow">
                                <img src="{{ asset('images/area/gridPark.jpg') }}" class="rounded-3 w-100 h-100 obj-fit" alt="Kert">
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <img src="{{ asset('images/area/gridPiac.jpg') }}" class="rounded-3 w-100 h-100 obj-fit" alt="Piac">
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row align-items-center bg-light bg-opacity-50 shadow-lg rounded-4 p-4 p-md-5">

                <div class="col-12 col-lg-8 mb-5 mb-lg-0 pe-lg-5 flex-column d-flex justify-content-center h-100">
                    <h1 class="display-5 fw-bold mb-4">Kalandok földön és vízen</h1>
    
                    <p class="fs-5 text-muted mb-4">
                        A passzív pihenés mellett számtalan lehetőség várja az aktív kikapcsolódás szerelmeseit. A Mura-vidék igazi paradicsom a horgászoknak és a vízitúrázóknak, de két keréken is bejárhatja a környéket a nemzetközi EuroVelo útvonalon.
                    </p>

                    <div class="row g-4 my-2 mb-5">
                        
                        <div class="col-12 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex justify-content-center align-items-center me-3 areaIcons">
                                    <i class="bi bi-bicycle fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Zárt kerékpártároló</h6>
                                    <small class="text-muted">Biztonságos elhelyezés</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center me-3 areaIcons">
                                    <i class="bi bi-map fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Túraútvonalak</h6>
                                    <small class="text-muted">Ingyenes térképek</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex justify-content-center align-items-center me-3 areaIcons">
                                    <i class="bi bi-water fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Kikötő a közelben</h6>
                                    <small class="text-muted">Könnyű vízre szállás</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex justify-content-center align-items-center me-3 areaIcons">
                                    <i class="bi bi-info-circle fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Helyi tippek</h6>
                                    <small class="text-muted">Személyes ajánlások</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="d-flex align-items-center gap-3">
                        <p class="fs-5 fw-bold mb-0 me-3">Válasszon élményt!</p>
                        
                        <button class="btn btn-outline-dark rounded-circle nav-btn" type="button" data-bs-target="#experienceCarousel" data-bs-slide="prev">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </button>
                        <button class="btn btn-outline-dark rounded-circle nav-btn" type="button" data-bs-target="#experienceCarousel" data-bs-slide="next">
                            <i class="bi bi-arrow-right fs-5"></i>
                        </button>
                    </div>
                </div>

                <div class="col-12 col-lg-4 mx-auto">
                    
                    <div id="experienceCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden bg-white" data-bs-ride="false">
                        
                        <div class="carousel-inner">
                            
                            <div class="carousel-item active">
                                <img src="{{ asset('images/area/slider/bicikli.jpg') }}" class="w-100 carousel-images" alt="Kerékpárút">
                                <div class="p-4 p-md-5">
                                    <h3 class="fw-bold mb-3">Tekerjen az Év Kerékpárútján!</h3>
                                    <p class="text-muted mb-0 fs-6">
                                        Fedezze fel a 2025-ös díjnyertes útvonalat! A Molnári-Murakeresztúr-Őrtilos közötti 14 km-es szakasz a vadregényes Mura-gáton és ártéri erdőkön vezet át, páratlan természeti környezetben.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('images/area/slider/vadviz.jpg') }}" class="w-100 carousel-images" alt="Vízitúra">
                                <div class="p-4 p-md-5">
                                    <h3 class="fw-bold mb-3">Vízitúrák a Murán</h3>
                                    <p class="text-muted mb-0 fs-6">
                                        Evezzen a Mura vadregényes szakaszain! Családoknak és baráti társaságoknak is biztonságos és felejthetetlen közös élményt nyújt a folyó és a környező ártér érintetlen világa.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('images/area/slider/horgaszat.png') }}" class="w-100 carousel-images" alt="Horgászat">
                                <div class="p-4 p-md-5">
                                    <h3 class="fw-bold mb-3">Horgászparadicsom</h3>
                                    <p class="text-muted mb-0 fs-6">
                                        Próbálja ki szerencséjét a helyi horgásztavakon vagy magán a folyón. Csend, maximális nyugalom és gazdag halállomány várja a pecásokat az év minden szakában.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('images/area/slider/pumpa.jpg') }}" class="w-100 carousel-images" alt="Pumpapálya">
                                <div class="p-4 p-md-5">
                                    <h3 class="fw-bold mb-3">Adrenalin két keréken</h3>
                                    <p class="text-muted mb-0 fs-6">
                                        Próbálja ki ügyességét a 800 m²-es, aszfaltozott pumpapályán! A hullámokkal és kanyarokkal teli pálya rollerral, gördeszkával és biciklivel is izgalmas kihívást nyújt minden korosztálynak.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('images/area/slider/jatszoter.jpg') }}" class="w-100 carousel-images" alt="Játszótér">
                                <div class="p-4 p-md-5">
                                    <h3 class="fw-bold mb-3">Önfeledt játék a legkisebbeknek</h3>
                                    <p class="text-muted mb-0 fs-6">
                                        Közvetlenül a pumpapálya mellett modern és biztonságos játszótér várja a gyerekeket. Tökéletes helyszín, hogy a család apraja-nagyja egyszerre kapcsolódhasson ki a szabadban.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('images/area/slider/focipalya.jpg') }}" class="w-100 carousel-images" alt="Focipálya">
                                <div class="p-4 p-md-5">
                                    <h3 class="fw-bold mb-3">Sportoljon profi körülmények között!</h3>
                                    <p class="text-muted mb-0 fs-6">
                                        Legyen szó baráti meccsről vagy edzőtáborról, a településen karbantartott élőfüves és modern műfüves pálya is rendelkezésre áll a futball szerelmeseinek.
                                    </p>
                                </div>
                            </div>
                            
                        </div>

                        <div class="carousel-indicators custom-indicators pb-4">
                            <button type="button" data-bs-target="#experienceCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#experienceCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#experienceCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#experienceCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#experienceCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#experienceCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-4">
            <div class="row g-4 g-lg-5 align-items-center justify-content-center">
                
                <div class="col-12 col-lg-7">
                    <div class="rounded-4 overflow-hidden shadow-sm mapFrame">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52390.08376553263!2d16.864415050667485!3d46.36116159780286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47689767204a6089%3A0x400c4290c1e9c70!2sMurakereszt%C3%BAr%2C%208834!5e0!3m2!1shu!2shu!4v1774897997771!5m2!1shu!2shu" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="col-12 col-lg-4 offset-xl-1">
                    
                    <div class="ps-4 border-start border-4 border-black">
                        
                        <h4 class="fw-bold mb-4 text-uppercase text-black">A közelben</h4>
                        
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-5 fs-5 text-dark">
                            <li class="d-flex align-items-center">
                                <i class="bi bi-person-walking fs-4 me-3 text-muted"></i>
                                <span>Helyi kisbolt: 10 perc séta</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-person-walking fs-4 me-3 text-muted"></i>
                                <span>Mura folyópart: 30 perc séta</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-person-walking fs-4 me-3 text-muted"></i>
                                <span>Vasútállomás: 20 perc séta</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-person-walking fs-4 me-3 text-muted"></i>
                                <span>Pizzéria: 20 perc séta</span>
                            </li>
                        </ul>

                        <h4 class="fw-bold mb-4 text-uppercase text-black">Kirándulás</h4>

                        <ul class="list-unstyled d-flex flex-column gap-3 mb-0 fs-5 text-dark">
                            <li class="d-flex align-items-start">
                                <i class="bi bi-car-front fs-4 me-3 text-muted"></i>
                                <div>
                                    Nagykanizsa központ: 17 km<br>
                                    <span class="fs-6">(20 perc)</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-car-front fs-4 me-3 text-muted"></i>
                                <div>
                                    Zalakaros Fürdő: 35 km<br>
                                    <span class="fs-6">(35 perc)</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-car-front fs-4 me-3 text-muted"></i>
                                <div>
                                    Kis-Balaton: 55 km <span class="fs-6">(50 perc)</span>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <x-frontend.cta />
</x-frontend.layout>