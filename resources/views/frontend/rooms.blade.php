<x-frontend.layout heroImage="rooms/hero.jpg" heroTitle="Szállásunk">
    <x-frontend.introduction>
        <p class="lead m-0">A vendégház két összenyitható, de szeparálható lakrészből áll, összesen 3 hálószobával és 2 fürdőszobával. Ideális elosztás nagycsaládoknak vagy baráti társaságoknak, akik együtt szeretnének lenni, de igénylik a privát szférát is. Teljes kapacitás: 10 fő (fix ágyakon) + 2 fő pótágyon.</p>
    </x-frontend.introduction>
    <section class="mt-3" id="rooms">
        <div class="container py-5">

            <div class="row align-items-center mb-5 pb-lg-5">
                <div class="col-12 col-lg-7">
                    <img src="{{ $rooms['living_room']?->image_path ? asset('storage/' . $rooms['living_room']->image_path) : asset('images/rooms/nappali2.jpg') }}" alt="{{ $rooms['living_room']?->title ?? 'Amerikai konyhás étkező és nappali' }}" class="img-fluid rounded-4 shadow w-100 rooms-img">
                </div>
                
                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-lg rounded-4 overlap-card-right bg-white p-4 p-md-5">
                        <h3 class="fw-bold mb-4">{{ $rooms['living_room']?->title ?? 'Amerikai konyhás étkező és nappali' }}</h3>
                        <div class="text-muted mb-0 fs-5 ta-justify">
                            {!! $rooms['living_room']?->description ?? 'Tágas, világos közösségi tér, ahol a család vagy a baráti társaság kényelmesen együtt lehet. A konyha teljesen felszerelt (mosogatógép, sütő, mikró, kávéfőző).' !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center flex-lg-row-reverse mb-5 pb-lg-5">
                <div class="col-12 col-lg-7">
                    <img src="{{ $rooms['family_zone']?->image_path ? asset('storage/' . $rooms['family_zone']->image_path) : asset('images/rooms/nappali2.jpg') }}" alt="{{ $rooms['family_zone']?->title ?? 'Családi pihenőzóna' }}" class="img-fluid rounded-4 shadow w-100 rooms-img">
                </div>
                
                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-lg rounded-4 overlap-card-left bg-white p-4 p-md-5">
                        <h3 class="fw-bold mb-4">{{ $rooms['family_zone']?->title ?? 'Családi pihenőzóna' }} –<br>Kicsiknek és nagyoknak</h3>
                        <div class="text-muted mb-4 fs-5">
                            {!! $rooms['family_zone']?->description ?? 'A közösségi térből két külön hálószoba nyílik, amelyek ideális elrendezést biztosítanak egy 4-5 fős család számára.' !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-5 pb-lg-5">
                <div class="col-12 col-lg-7">
                    <img src="{{ $rooms['master_bedroom']?->image_path ? asset('storage/' . $rooms['master_bedroom']->image_path) : asset('images/rooms/nappali2.jpg') }}" alt="{{ $rooms['master_bedroom']?->title ?? 'A "Nagy Háló"' }}" class="img-fluid rounded-4 shadow w-100 rooms-img">
                </div>
                
                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-lg rounded-4 overlap-card-right bg-white p-4 p-md-5">
                        <h3 class="fw-bold mb-4">{{ $rooms['master_bedroom']?->title ?? 'A "Nagy Háló"' }} – Saját birodalom fürdőszobával</h3>
                        <div class="text-muted mb-0 fs-5 ta-justify">
                            {!! $rooms['master_bedroom']?->description ?? 'Különálló, tágas hálószoba a ház csendesebb részén, kényelmes franciaággyal és gardróbbal, a maximális kényelemért.' !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center flex-lg-row-reverse mb-5 pb-lg-5">
                <div class="col-12 col-lg-7">
                    <img src="{{ $rooms['bath']?->image_path ? asset('storage/' . $rooms['bath']->image_path) : asset('images/rooms/nappali2.jpg') }}" alt="{{ $rooms['bath']?->title ?? 'Közös használatú és privát fürdőszoba' }}" class="img-fluid rounded-4 shadow w-100 rooms-img">
                </div>
                
                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-lg rounded-4 overlap-card-left bg-white p-4 p-md-5">
                        <h3 class="fw-bold mb-4">{{ $rooms['bath']?->title ?? 'Közös használatú és privát fürdőszoba' }}</h3>
                        <div class="text-muted mb-4 fs-5">
                            {!! $rooms['bath']?->description ?? 'Modern, tiszta fürdőszoba zuhanyzóval, - a közös használatú helyiségben - mosógéppel és alapvető tisztálkodási szerekkel ellátva.' !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <p class="fs-5 text-center mb-5">Még több fényképet szeretne látni? <a href="#gallery" class="link-underline">Nézze meg a galériát</a></p>
                    <hr class="mt-5 border-2 border-black">
                </div>
            </div>

        </div>
    </section>

    <section class="mt-4" id="floorPlan">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto text-center">
                    <p>Szeretné pontosan látni az elrendezést? Tekintse meg részletes alaprajzunkat, ahol a bútorok elhelyezkedését is jelöltük.<br><small>(A kép csak tájékoztató jellegű, a méretarány nem feltétlenül egyezik meg a valósággal.)</small></p>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <img class="w-100" src="{{ asset('images/rooms/Alaprajz_teljes.png') }}" alt="Alaprajz">
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-8 col-lg-6 text-center">
                    <h1>Mire nem lesz gondja?</h1>
                    <p>A kényelem nálunk az apró részletekben rejlik.</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
        
                @foreach($roomFeatures as $feature)
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-4 h-100 bg-white">
                            <div class="card-body py-4 px-3 text-center">
                                
                                <div class="mx-auto bg-{{ $feature['color'] }} bg-opacity-10 text-{{ $feature['color'] }} d-flex justify-content-center align-items-center rounded-circle mb-3 roomsIcon" style="width: 60px; height: 60px;">
                                    <i class="bi {{ $feature['icon'] }} fs-3"></i>
                                </div>
                                
                                <h5 class="fw-bold mb-3">{{ $feature['title'] }}</h5>
                                
                                <p class="mb-0 lh-base text-muted">
                                    {{ $feature['desc'] }}
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <x-frontend.cta />
</x-frontend.layout>