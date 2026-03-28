<x-admin.layout>
    <div class="container-fluid mt-4">
        <div class="row g-4 mb-5"> <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100 hover-lift position-relative border-warning border-start border-4">
                    <div class="card-header bg-transparent text-warning border-0 pt-3 pb-0">
                        <h6 class="m-0 text-uppercase fw-bold">Függő foglalások</h6>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="text-warning">
                            <span class="display-3 fw-bold me-2">{{ $pendingBookingsCount }}</span>
                            <span class="fs-4 text-muted">db</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.bookings.index') }}" class="stretched-link"></a>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                @if($guestId)
                    <div class="card shadow-sm h-100 hover-lift position-relative border-primary border-start border-4 bg-primary bg-opacity-10">
                        <div class="card-header bg-transparent border-0 pt-3 pb-0">
                            <h6 class="m-0 text-primary text-uppercase fw-bold">Jelenlegi vendég</h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <h3 class="fw-bold mb-1">{{ $guestName }}</h3>
                            <div class="text-muted"><span class="fs-5 fw-bold me-1">{{ $currentGuestCount }}</span> fő</div>
                        </div>
                        <a href="{{ route('admin.bookings.show', $guestId) }}" class="stretched-link"></a>
                    </div>
                @else
                    <div class="card shadow-sm h-100 border-secondary border-start border-4 bg-light">
                        <div class="card-header bg-transparent border-0 pt-3 pb-0">
                            <h6 class="m-0 text-muted text-uppercase fw-bold">Jelenlegi vendég</h6>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center text-center">
                            <h4 class="text-muted">A ház jelenleg üres.</h4>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm h-100 border-success border-start border-4">
                    <div class="card-header bg-transparent text-success border-0 pt-3 pb-0">
                        <h6 class="m-0 text-uppercase fw-bold">E havi várható bevétel</h6>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center text-success">
                        <h2 class="fw-bold m-0 me-2">{{ number_format($monthlyIncome, 0, ',', '.') }}</h2>
                        <span class="fs-5 text-muted">Ft</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Bevételek alakulása az elmúlt 6 hónapban</h6>
                    </div>
                    <div class="card-body">
                        <div style="height: 350px;">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')     
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('revenueChart').getContext('2d');
                
                const chartLabels = @json($chartLabels);
                const chartData   = @json($chartData);

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'Bruttó bevétel (Ft)',
                            data: chartData,
                            borderColor: '#198754',
                            backgroundColor: 'rgba(25, 135, 84, 0.1)',
                            borderWidth: 3,
                            pointBackgroundColor: '#198754',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: '#198754',
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let value = context.parsed.y;
                                        return new Intl.NumberFormat('hu-HU').format(value) + ' Ft';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return new Intl.NumberFormat('hu-HU').format(value) + ' Ft';
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
</x-admin.layout>