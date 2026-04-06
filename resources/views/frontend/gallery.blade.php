<x-frontend.layout heroImage="gallery/hero.jpg" heroTitle="Tekintse meg vendégházunk galériáját!">

    <section class="py-5">
        <div class="container py-4">
            
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-5" id="gallery-filters">
                <button class="btn btn-light rounded-pill px-4 filter-btn active" data-filter="all">Összes</button>
                <button class="btn btn-light rounded-pill px-4 filter-btn" data-filter="room">Szobák & Belső</button>
                <button class="btn btn-light rounded-pill px-4 filter-btn" data-filter="exterior">Kert & Wellness</button>
            </div>

            <div class="masonry-grid" id="gallery-grid">
                
                @foreach($galleryImages as $image)
                    <div class="masonry-item" data-category="{{ $image->category }}">
                        <a href="{{ asset('storage/' . $image->image_path) }}" target="_blank">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Galéria kép" class="img-fluid rounded-4 shadow-sm w-100">
                        </a>
                    </div>
                @endforeach
                
            </div>

            @if($galleryImages->isEmpty())
                <div class="text-center text-muted py-5">
                    <i class="bi bi-images display-1 mb-3"></i>
                    <p class="fs-4">A galéria feltöltés alatt áll.</p>
                </div>
            @endif

        </div>
    </section>
    <x-frontend.cta/>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.masonry-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    galleryItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');

                        if (filterValue === 'all' || filterValue === itemCategory) {
                            item.style.display = 'block';
                            setTimeout(() => { item.style.opacity = '1'; }, 50);
                        } else {
                            item.style.opacity = '0';
                            setTimeout(() => { item.style.display = 'none'; }, 300);
                        }
                    });
                });
            });
        });
    </script>
    @endpush

</x-frontend.layout>