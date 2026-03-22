<x-admin.layout>
    @section('title', 'Foglalás kezelése')

    <div class="container-fluid py-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-gray-800">Foglalás kezelése: #{{ $booking->id }} ({{ $booking->guest->name }})</h3>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Vissza a listához
        </a>
    </div>

    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card shadow bg-white mb-3">
                    <div class="card-header">
                        <h4 class="m-0">Vendég és Foglalás adatai</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input class="form-control bg-white" type="email" name="email" value="{{ old('email', $booking->guest->email) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Név</label>
                                <input class="form-control bg-white" type="text" name="name" value="{{ old('name', $booking->guest->name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Telefonszám</label>
                                <input class="form-control bg-white" type="text" name="phone" value="{{ old('phone', $booking->guest->phone) }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Érkezés napja</label>
                                <input type="date" class="form-control bg-white" name="check_in" value="{{ old('check_in', \Carbon\Carbon::parse($booking->check_in)->format('Y-m-d')) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Távozás napja</label>
                                <input type="date" class="form-control bg-white" name="check_out" value="{{ old('check_out', \Carbon\Carbon::parse($booking->check_out)->format('Y-m-d')) }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Felnőtt</label>
                                <input type="number" class="form-control bg-white" name="adults" min="1" value="{{ old('adults', $booking->adults) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Gyerek</label>
                                <input type="number" class="form-control bg-white" name="children" min="0" value="{{ old('children', $booking->children) }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold d-block">Igényelt Extrák</label>
                                <div class="form-check form-switch fs-5 mb-2">
                                    <input class="form-check-input" type="checkbox" name="wants_heating" value="1" id="wants_heating" {{ $booking->wants_heating ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wants_heating">Fűtés</label>
                                </div>
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="wants_ac" value="1" id="wants_ac" {{ $booking->wants_ac ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wants_ac">Klíma</label>
                                </div>
                            </div>
                            <div class="col-md-9 mb-3 bg-info bg-opacity-50 p-3 rounded">
                                <label class="form-label fw-bold">Kalkulált végösszeg (Ft)</label>
                                <input type="number" step="1000" class="form-control form-control-xl border-primary fw-bold mb-2" name="total_price" value="{{ old('total_price', $booking->total_price) }}" required>
                                <small class="text-muted">Szabadon átírható manuális módosításhoz.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow bg-white mb-3">
                    <div class="card-header">
                        <h5 class="m-0">Vendég üzenete</h5>
                    </div>
                    <div class="card-body">
                        {{ old('guest_comment', $booking->guest_comment ? $booking->guest_comment : 'Nincs megjegyzés') }}
                    </div>
                </div>

            </div>

            <div class="col-12 col-xl-4">
                <div class="card shadow bg-white mb-3">
                    <div class="card-header">
                        <h4 class="m-0">Foglalás állapota</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3">
                            <input type="radio" class="btn-check" name="status" id="confirmed" value="confirmed" autocomplete="off" {{ $booking->status == 'confirmed' ? 'checked' : '' }}>
                            <label class="btn btn-outline-success" for="confirmed">Visszaigazolva</label>
        
                            <input type="radio" class="btn-check" name="status" id="pending" value="pending" autocomplete="off" {{ $booking->status == 'pending' ? 'checked' : '' }}>
                            <label class="btn btn-outline-warning" for="pending">Függőben</label>
        
                            <input type="radio" class="btn-check" name="status" id="cancelled" value="cancelled" autocomplete="off" {{ $booking->status == 'cancelled' ? 'checked' : '' }}>
                            <label class="btn btn-outline-danger" for="cancelled">Lemondva / Elutasítva</label>
                        </div>
                    </div>
                </div>

                <div class="card shadow bg-white mb-4">
                    <div class="card-header">
                        <h5 class="m-0">Belső megjegyzés <small class="text-muted fs-6">(ezt csak te látod)</small></h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control bg-white w-100" name="internal_notes" rows="4" placeholder="Pl.: Előleg megérkezett...">{{ old('internal_notes', $booking->internal_notes) }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold fs-5">Változások Mentése</button>
            </div>
        </div>
    </form>
</div>
</x-admin.layout>