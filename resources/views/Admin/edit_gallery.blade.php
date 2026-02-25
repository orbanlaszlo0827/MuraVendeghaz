<x-admin.layout>
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
</x-admin.layout>