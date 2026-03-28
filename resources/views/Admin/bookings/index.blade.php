<x-admin.layout>
    @section('title', 'Foglalások kezelése')

    <div class="container-fluid py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Foglalások kezelése</h1>
            <a href="{{ route('admin.bookings.calendar') }}" class="btn btn-outline-primary">
                <i class="bi bi-calendar3"></i> Naptár nézet
            </a>
        </div>

        <div class="mb-4">
            <a href="{{ route('admin.bookings.index') }}" class="btn {{ !request('trashed') ? 'btn-primary shadow-sm' : 'btn-outline-primary' }}">
                <i class="bi bi-list-check"></i> Aktív foglalások
            </a>
            <a href="{{ route('admin.bookings.index', ['trashed' => 'only']) }}" class="btn {{ request('trashed') == 'only' ? 'btn-danger shadow-sm' : 'btn-outline-danger' }} ms-2">
                <i class="bi bi-trash"></i> Lomtár (Törölt foglalások)
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>Vendég neve</th>
                                <th>Dátum (Érk. - Táv.)</th>
                                <th>Fő</th>
                                <th>Összeg</th>
                                <th>Státusz</th>
                                <th class="text-end">Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td><span class="text-muted">#{{ $booking->id }}</span></td>
                                    <td class="fw-bold">
                                        {{ $booking->guest->name ?? 'Ismeretlen vendég' }}<br>
                                        <small class="text-muted fw-normal">{{ $booking->guest->phone ?? '' }}</small>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($booking->check_in)->format('Y.m.d.') }} - <br>
                                        {{ \Carbon\Carbon::parse($booking->check_out)->format('Y.m.d.') }}
                                    </td>
                                    <td>
                                        <i class="bi bi-person-fill"></i> {{ $booking->adults }} 
                                        @if($booking->children > 0)
                                            <span class="text-muted ms-1"><i class="bi bi-person"></i> {{ $booking->children }}</span>
                                        @endif
                                    </td>
                                    <td class="fw-bold text-primary">
                                        {{ number_format($booking->total_price, 0, ',', '.') }} Ft
                                    </td>
                                    
                                    <td>
                                        @if($booking->trashed())
                                            <span class="badge bg-dark px-2 py-1">Lomtárban (Törölve)</span>
                                        @else
                                            @if($booking->status == 'pending')
                                                <span class="badge bg-warning text-dark px-2 py-1">Függőben</span>
                                            @elseif($booking->status == 'confirmed')
                                                <span class="badge bg-success px-2 py-1">Visszaigazolt</span>
                                            @elseif($booking->status == 'cancelled')
                                                <span class="badge bg-danger px-2 py-1">Lemondva</span>
                                            @else
                                                <span class="badge bg-secondary px-2 py-1">{{ $booking->status }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    
                                    <td class="text-end">
                                        @if($booking->trashed())
                                            <form action="{{ route('admin.bookings.restore', $booking->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success" title="Visszaállítás">
                                                    <i class="bi bi-arrow-counterclockwise"></i> Visszaállítás
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-outline-warning" title="Megtekintés">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Biztosan törlöd ezt a foglalást? Ezt nem lehet visszavonni!');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Törlés">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        Még nem érkezett egyetlen foglalás sem, vagy a lomtár üres.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($bookings->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bookings->links() }}
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</x-admin.layout>