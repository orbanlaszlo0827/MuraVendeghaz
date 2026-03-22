<x-admin.layout>
    @section('title', 'Naptár nézet')

    @push('styles')
      <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    @endpush

    
    <div class="container-fluid py-4">
        <h1 class="h3 mb-3 text-gray-800">Foglalási Naptár</h1>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row gap-3 mt-2">
                    <span class="badge bg-success px-3 py-2 fs-6">Visszaigazolt Foglalások</span>
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6">Függőben lévő (Új) Foglalások</span>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/hu.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                
                var bookingEvents = @json($events);

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'hu',
                    firstDay: 1, 
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,listWeek' 
                    },
                    buttonText: {
                        today: 'Ma',
                        month: 'Hónap',
                        week: 'Heti bontás',
                        list: 'Lista'
                    },
                    events: bookingEvents, 
                    
                    displayEventTime: true,
                    displayEventEnd: true,
                    eventDisplay: 'block',
                    
                    slotMinTime: '06:00:00',
                    slotMaxTime: '22:00:00',
                    
                    height: 750, 
                    
                    eventClick: function(info) {
                        info.jsEvent.preventDefault(); 
                        if (info.event.url) {
                            window.location.href = info.event.url;
                        }
                    }
                });

                calendar.render();
            });
        </script>
    @endpush
</x-admin.layout>