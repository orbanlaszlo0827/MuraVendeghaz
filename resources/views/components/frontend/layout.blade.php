@props([
    'heroImage' => null,
    'heroTitle' => null
])

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Üdvözlünk!') | Mura Vendégház</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (request()->routeIs('booking'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    @endif
    
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-light py-2 pb-lg-0">
            
            <div class="container-lg flex-lg-column align-items-center">   
                
                <div class="d-flex justify-content-between align-items-center w-100">
                    
                    <a class="navbar-brand mx-lg-auto p-0 m-0" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="Mura Vendégház" class="img-fluid logo-image">
                    </a>

                    <button class="navbar-toggler border-0 shadow-none px-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Menü megnyitása">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>

                <div class="collapse navbar-collapse w-100 justify-content-center mt-3 mt-lg-1" id="mainNavbar">
                    
                    <ul class="navbar-nav align-items-center gap-3 gap-lg-4 text-center pb-3 pb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha" href="#">Szállásunk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha" href="#">Szolgáltatások</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha" href="#">Környék</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha" href="#">Galéria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link frontend-nav-ha" href="#">Árak & Kapcsolat</a>
                        </li>
                        
                        <li class="nav-item mt-2 mt-lg-0">
                            <a href="{{ route('booking') }}" class="btn btn-primary py-1 px-3 rounded-pill btn-foglalas">Foglalás</a>
                        </li>
                    </ul>
                    
                </div>

            </div>
        </nav>
        @if($heroImage && $heroTitle)
            <div class="position-relative w-100">
                
                <img src="{{ asset('images/' . $heroImage) }}" alt="{{ $heroTitle }}" class="w-100 hero-image">
                
                <div class="position-absolute top-0 inset-s-0 w-100 h-100 d-flex justify-content-center align-items-center">
                    
                    <div class="bg-dark bg-opacity-75 px-4 py-3 rounded text-center shadow">
                        <h1 class="text-white fw-bold mb-0 display-3 ls-2">{{ $heroTitle }}</h1>
                    </div>

                </div>
            </div>
        @endif
    </header>
    
    <main>
        {{ $slot }}
    </main>

    <footer class="bg-white">
        <div class="container-fluid px-0 pt-4 pt-lg-5">
            
            <div class="row justify-content-center mb-4 mx-0">
                <div class="col-12 col-md-8 col-lg-4 text-center px-4 d-flex flex-column gap-2">
                    <h2>Mura Vendégház</h2>
                    <p>Vendégházunk ideális búvóhelyet kínál az aktív kikapcsolódást kereső családoknak és a csendre vágyó pároknak egyaránt. Tapasztalja meg nálunk a Mura folyó és a Zalai-dombság lágy öle nyújtotta teljes kikapcsolódást.</p>
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center mx-0 mb-4">
                <div class="col-12 d-flex justify-content-center">
                    <ul class="list-unstyled d-flex flex-column flex-lg-row align-items-center gap-3 gap-md-5 mb-0">
                        <li>
                            <a href="https://maps.google.com/?q=8834+Murakeresztúr,+Alkotmány+út+11" target="_blank" class="nav-link nav-link-animated text-black">
                                <i class="bi bi-geo-alt-fill"></i> 8834 Murakeresztúr, Alkotmány út 11.
                            </a>
                        </li>
                        <li>
                            <a href="tel:+36305054042" class="nav-link nav-link-animated text-black">
                                <i class="bi bi-telephone-fill"></i> +36 30 505 4042
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@muravendeghaz.hu" class="nav-link nav-link-animated text-black">
                                <i class="bi bi-envelope-fill"></i> info@muravendeghaz.hu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mx-0 bg-secondary py-3">
                <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center">                
                        <ul class="list-unstyled d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-3 gap-md-4 mb-0">
                            <li><a class="nav-link" href="#">Főoldal</a></li>
                            <li><a class="nav-link" href="#">Szállásunk</a></li>
                            <li><a class="nav-link" href="#">Szolgáltatások</a></li>
                            <li><a class="nav-link" href="#">Környék</a></li>
                            <li><a class="nav-link" href="#">Galéria</a></li>
                            <li><a class="nav-link" href="#">Árak & Kapcsolat</a></li>
                        </ul>
                </div>
            </div>

            <div class="row mx-0 py-1 bg-primary d-flex align-items-center justify-content-center justify-content-md-between">
                <div class="col-12 col-md-6 d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-2 gap-md-4 order-1 order-md-2">
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">ÁSZF</a>
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">Impresszum</a>
                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover text-center" href="#">Házirend</a>
                    <p class="text-white text-center mb-0"><b>NTAK: </b>MA-19006725</p>
                </div>
                <div class="col-12 col-md-6 text-white text-center text-md-start order-2 order-md-1">
                    <p class="mb-0">&copy; {{ date('Y') }} Mura Vendégház. Minden jog fenntartva.</p>
                </div>
            </div>

        </div>
    </footer>

    @if (request()->routeIs('booking'))
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/hu.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
    
                const form = document.querySelector('form');
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const submitBtn = document.getElementById('submit-booking-btn');
                const protectionCheck = document.getElementById('protectionCheck');

                const adultInput = document.querySelector('input[name="adults"]');
                const childInput = document.querySelector('input[name="children"]');
                const heatingSwitch = document.getElementById('futesSwitch');
                const acSwitch = document.getElementById('klimaSwitch');

                const nameInput = document.querySelector('input[name="name"]');
                const phoneInput = document.querySelector('input[name="phone"]');
                const emailInput = document.querySelector('input[name="email"]');

                const elNights = document.getElementById('summary-nights');
                const elStartDate = document.getElementById('summary-start-date');
                const elEndDate = document.getElementById('summary-end-date');
                const elAdultCount = document.getElementById('summary-adult-count');
                const elAdultPrice = document.getElementById('summary-adult-price');
                const rowChild = document.getElementById('summary-child-row');
                const elChildCount = document.getElementById('summary-child-count');
                const elChildPrice = document.getElementById('summary-child-price');
                const rowHeating = document.getElementById('summary-heating-row');
                const elHeatingNights = document.getElementById('summary-heating-nights');
                const elHeatingPrice = document.getElementById('summary-heating-price');
                const rowAc = document.getElementById('summary-ac-row');
                const elAcNights = document.getElementById('summary-ac-nights');
                const elAcPrice = document.getElementById('summary-ac-price');
                const elTotalPrice = document.getElementById('summary-total-price');

                let checkInDate = null;
                let checkOutDate = null;
                let currentNights = 0;
                
                let debounceTimer; 

                flatpickr("#dateRange", {
                    mode: "range",
                    locale: "hu",
                    minDate: "today",
                    dateFormat: "Y. M. d.",
                    showMonths: window.innerWidth > 768 ? 2 : 1,
                    onChange: function(selectedDates) {
                        if (selectedDates.length === 2) {
                            checkInDate = formatDateForBackend(selectedDates[0]);
                            checkOutDate = formatDateForBackend(selectedDates[1]);
                            
                            elStartDate.textContent = selectedDates[0].toLocaleDateString('hu-HU');
                            elEndDate.textContent = selectedDates[1].toLocaleDateString('hu-HU');
                            
                            triggerCalculation();
                        } else {
                            checkInDate = null;
                            checkOutDate = null;
                            disableSubmit();
                        }
                    }
                });

                const priceInputs = [adultInput, childInput, heatingSwitch, acSwitch];
                priceInputs.forEach(input => {
                    if(input) {
                        input.addEventListener('change', triggerCalculation);
                        if(input.type === 'number') input.addEventListener('input', triggerCalculation);
                    }
                });

                const personalInputs = [nameInput, phoneInput, emailInput, protectionCheck];
                personalInputs.forEach(input => {
                    if(input) {
                        input.addEventListener('input', checkSubmitConditions);
                        input.addEventListener('change', checkSubmitConditions);
                    }
                });


                function formatDateForBackend(dateObj) {
                    const d = new Date(dateObj);
                    let month = '' + (d.getMonth() + 1);
                    let day = '' + d.getDate();
                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;
                    return [d.getFullYear(), month, day].join('-');
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                function checkSubmitConditions() {
                    const isDatesValid = currentNights > 0;
                    
                    const isNameValid = nameInput && nameInput.value.trim().length > 3;
                    const isPhoneValid = phoneInput && phoneInput.value.trim().length > 6;

                    const isEmailValid = emailInput && emailRegex.test(emailInput.value.trim()); 
                    
                    const checkbox = document.getElementById('protectionCheck');
                    const isProtected = checkbox ? checkbox.checked : false;

                    toggleValidationClass(nameInput, isNameValid);
                    toggleValidationClass(phoneInput, isPhoneValid);
                    toggleValidationClass(emailInput, isEmailValid);

                    if (isDatesValid && isNameValid && isPhoneValid && isEmailValid && isProtected) {
                        submitBtn.disabled = false;
                    } else {
                        submitBtn.disabled = true;
                    }
                }

                function toggleValidationClass(input, isValid) {
                    if (!input) return;
                    
                    if (input.value.trim() === '') {
                        input.classList.remove('is-valid', 'is-invalid');
                    } else if (isValid) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                }

                function disableSubmit() {
                    currentNights = 0;
                    elTotalPrice.textContent = "0";
                    elAdultPrice.textContent = "0";
                    submitBtn.disabled = true;
                }

                function triggerCalculation() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        calculatePrice();
                    }, 350); 
                }

                function calculatePrice() {
                    if (!checkInDate || !checkOutDate) return;

                    const adults = adultInput ? parseInt(adultInput.value) || 1 : 1;
                    const children = childInput ? parseInt(childInput.value) || 0 : 0;
                    const wantsHeating = heatingSwitch && heatingSwitch.checked ? 1 : 0;
                    const wantsAc = acSwitch && acSwitch.checked ? 1 : 0;
                    
                    if(elAdultCount) {
                        elAdultCount.textContent = adults;
                    }
                    if(elChildCount){
                        elChildCount.textContent = children;
                    }

                    const payload = {
                        check_in: checkInDate,
                        check_out: checkOutDate,
                        adults: adults,
                        children: children,
                        wants_heating: wantsHeating,
                        wants_ac: wantsAc
                    };

                    fetch('/kalkulacio', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            currentNights = data.nights;
                            if(elNights) elNights.textContent = data.nights;
                            if(elTotalPrice) elTotalPrice.textContent = data.total_price;
                            if(elAdultPrice) elAdultPrice.textContent = data.adult_total;

                            if (children > 0) {
                                rowChild.classList.remove('d-none');
                                rowChild.classList.add('d-flex');
                                elChildPrice.textContent = data.child_total;
                            } else {
                                rowChild.classList.add('d-none');
                                rowChild.classList.remove('d-flex');
                            }

                            if (wantsHeating) {
                                rowHeating.classList.remove('d-none');
                                rowHeating.classList.add('d-flex');
                                elHeatingNights.textContent = data.nights;
                                elHeatingPrice.textContent = data.heating_total;
                            } else {
                                rowHeating.classList.add('d-none');
                                rowHeating.classList.remove('d-flex');
                            }

                            if (wantsAc) {
                                rowAc.classList.remove('d-none');
                                rowAc.classList.add('d-flex');
                                elAcNights.textContent = data.nights;
                                elAcPrice.textContent = data.ac_total;
                            } else {
                                rowAc.classList.add('d-none');
                                rowAc.classList.remove('d-flex');
                            }

                            checkSubmitConditions();
                        }
                    });
                }
            });
        </script>
    @endif
</body>
</html>