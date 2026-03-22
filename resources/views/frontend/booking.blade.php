<x-frontend.layout>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    @endpush

    <div class="position-relative w-100">      
        <img src="{{ asset('images/booking_page/hero.jpg') }}" alt="Foglalás" class="w-100 booking-hero-image">
        
        <div class="position-absolute top-0 inset-s-0 w-100 h-100 d-flex justify-content-center align-items-center">
            
            <div class="bg-dark bg-opacity-75 px-4 py-3 rounded text-center shadow">
                <h1 class="text-white fw-bold mb-0 display-3 ls-2">Foglalás</h1>
            </div>
        </div>
    </div>

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <input type="hidden" name="check_in" id="hidden_check_in">
        <input type="hidden" name="check_out" id="hidden_check_out">

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
                                    
                                    <div id="date-error" class="text-danger mt-2 d-none fw-bold fs-5"></div>
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
                                                <p class="text-danger mb-0 fs-5 fw-bold">Kötelező fűtési szezon aktív - az ár az időtartamtól függően változik.</p>
                                            @else
                                                <p class="text-muted mb-0 fs-6">Az ár az dőtartamtól függően változik.</p>
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
                                                <p class="text-muted mb-0 fs-6">Hűtés és komfort (+2.000 Ft/nap). <br><em>A teljes időtartamra számolva, tájékoztató jellegű. Ha csak bizonyos napokra kéri, a helyszínen módosítható!</em></p>
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

                    <div class="bg-light rounded-3 border mb-4 p-4 border-primary">
                        <h3 class="mb-3 text-primary"><i class="bi bi-info-circle me-2"></i>Helyszínen igényelhető extrák</h3>
                        <ul class="mb-2 text-muted fs-5">
                            <li><strong>Szauna használat:</strong> 3.000 Ft / óra (A felfűtéstől számítva.)</li>
                            <li><strong>Fazekas bemutató:</strong> 15.000 Ft / óra (Korongozás szakemberrel, anyaggal.)</li>
                            <li><strong>Sátrazás:</strong> 6.000 Ft / fő / éj (Az udvaron.)</li>
                        </ul>
                        <a class="ms-4" href="#">Kattints a teljes árlistáért és az egyéb tudnivalókért!</a>
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
                                <input class="form-check-input" type="checkbox" value="1" id="protectionCheck" name="terms">
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
                                <span class="text-muted fs-4">Várható végösszeg</span>
                                <span class="fw-bold fs-2 text-primary"><span id="summary-total-price">0</span> Ft</span>
                            </div>
                            <p class="text-muted fs-6 mb-3" style="font-size: 0.85rem;">
                                * A végleges fizetendő összeg a helyszínen kért extra szolgáltatások függvényében változhat. A foglalás elküldése még nem jár fizetési kötelezettséggel!
                            </p>

                            <button type="submit" id="submit-booking-btn" class="btn btn-success w-100 fw-bold fs-2 mt-3 d-flex justify-content-center align-items-center gap-2" disabled>
                                <span id="btn-text">Foglalás véglegesítése</span>
                                <span id="btn-spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/hu.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
    
                const form = document.querySelector('form');
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const submitBtn = document.getElementById('submit-booking-btn');
                const btnText = document.getElementById('btn-text');
                const btnSpinner = document.getElementById('btn-spinner');
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

                const rawDisabledDates = @json($bookedDates);

                const parsedDisabledDates = rawDisabledDates.map(range => {
                    return {
                        from: new Date(range.from + "T00:00:00"),
                        to: new Date(range.to + "T00:00:00")
                    };
                });

                //console.log("Foglalt dátumok a Laraveltől:", disabledDates);

                const elDateError = document.getElementById('date-error');

                let checkInDate = null;
                let checkOutDate = null;
                let currentNights = 0;
                
                let debounceTimer; 
                let fetchCounter = 0;
                let isTimerRunning = false;

                flatpickr("#dateRange", {
                    mode: "range",
                    locale: "hu",
                    minDate: new Date().fp_incr(3),
                    dateFormat: "Y. M. d.",
                    showMonths: window.innerWidth > 768 ? 2 : 1,
                    disable: parsedDisabledDates,
                    onChange: function(selectedDates, dateStr, instance) {

                        if (elDateError) elDateError.classList.add('d-none');

                        if (selectedDates.length === 2) {
                            checkInDate = formatDateForBackend(selectedDates[0]);
                            checkOutDate = formatDateForBackend(selectedDates[1]);

                            document.getElementById('hidden_check_in').value = checkInDate;
                            document.getElementById('hidden_check_out').value = checkOutDate;
                            
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

                function showLoading() {
                    if (btnText && btnSpinner) {
                        btnText.textContent = 'Árkalkuláció...';
                        btnSpinner.classList.remove('d-none');
                        submitBtn.disabled = true;
                    }
                }

                function hideLoading() {
                    if (btnText && btnSpinner) {
                        btnText.textContent = 'Foglalás véglegesítése';
                        btnSpinner.classList.add('d-none');
                        checkSubmitConditions();
                    }
                }

                function triggerCalculation() {
                    showLoading(); 
                    isTimerRunning = true;

                    clearTimeout(debounceTimer); 
                    debounceTimer = setTimeout(() => {
                        isTimerRunning = false;
                        calculatePrice();
                    }, 350);
                }

                function calculatePrice() {
                    if (!checkInDate || !checkOutDate) {
                        if (!isTimerRunning) hideLoading();
                        return;
                    }

                    const adults = adultInput ? parseInt(adultInput.value) || 1 : 1;
                    const children = childInput ? parseInt(childInput.value) || 0 : 0;
                    const wantsHeating = heatingSwitch && heatingSwitch.checked ? 1 : 0;
                    const wantsAc = acSwitch && acSwitch.checked ? 1 : 0;
                    
                    if(elAdultCount) elAdultCount.textContent = adults;
                    if(elChildCount) elChildCount.textContent = children;

                    const payload = {
                        check_in: checkInDate,
                        check_out: checkOutDate,
                        adults: adults,
                        children: children,
                        wants_heating: wantsHeating,
                        wants_ac: wantsAc
                    };

                    const currentFetchId = ++fetchCounter;

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
                        if (currentFetchId !== fetchCounter) return;

                        if (elDateError) elDateError.classList.add('d-none');

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
                            
                            if (!isTimerRunning) hideLoading();
                        } else {
                            console.error("Laravel Hiba:", data.error);
                            if (!isTimerRunning) hideLoading();

                            if (elDateError && data.error) {
                                elDateError.textContent = data.error;
                                elDateError.classList.remove('d-none');
                            }
                            
                            disableSubmit(); 
                            hideLoading();
                        }
                    })
                    .catch(error => {
                        console.error('Hiba az árszámítás során:', error);
                        if (currentFetchId === fetchCounter && !isTimerRunning) hideLoading();
                    });
                }
            });
        </script>
    @endpush
</x-frontend.layout>