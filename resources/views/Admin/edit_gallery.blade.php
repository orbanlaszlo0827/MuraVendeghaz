<x-admin.layout>
    @push('styles')
      <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush

    @section('title', 'Galéria Szerkesztése')
    
    <form action="{{ route('admin.gallery.store') }}" class="dropzone" id="myDropzone">
    @csrf
    </form>

    @csrf
    @method('PATCH')
    <div class="mt-4">
        <h2>Feltöltött képek</h2>
        <div class="row g-3 mt-2">
            @foreach($images as $image)
                <div class="col-md-4">
                    <div class="card bg-white">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Gallery Image">
                        <div class="card-body">
                            <select class="form-select category-select" data-id="{{ $image->id }}">
                                <option value="all" {{ $image->category === 'all' ? 'selected' : '' }}>Összes</option>
                                <option value="room" {{ $image->category === 'room' ? 'selected' : '' }}>Szoba</option>
                                <option value="exterior" {{ $image->category === 'exterior' ? 'selected' : '' }}>Külső</option>
                            </select>
                            <form class="mt-2" action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Biztosan törlöd ezt a képet?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-0 w-100">Törlés</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.myDropzone = {
                paramName: "image",
                maxFilesize: 4,
                acceptedFiles: ".jpeg,.jpg,.png,.webp",
                dictDefaultMessage: "Húzd ide a képeket, vagy kattints a feltöltéshez!",
                success: function (file, response) {
                    console.log("Sikeres feltöltés:", response);
                },
                queuecomplete: function() {
                    setTimeout(function() { location.reload(); }, 1000); 
                }
            };

            document.querySelectorAll('.category-select').forEach(function(select) {
                select.addEventListener('change', function() {
                    let imageId = this.getAttribute('data-id');
                    let newCategory = this.value;

                    fetch(`/admin/galeria/${imageId}/kategoria`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ category: newCategory })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            select.style.backgroundColor = '#d1e7dd'; 
                            select.style.borderColor = '#badbcc';
                            select.style.color = '#0f5132';

                            setTimeout(() => {
                                select.style.backgroundColor = '';
                                select.style.borderColor = '';
                                select.style.color = '';
                            }, 1500);
                        }
                    })
                    .catch(error => {
                        select.style.backgroundColor = '#f8d7da';
                        alert('Hiba történt a mentés során!');
                    });
                });
            });
        </script>
    @endpush
</x-admin.layout>