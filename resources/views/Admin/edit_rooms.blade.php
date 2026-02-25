<x-admin.layout>
    <form action="{{ route('admin.rooms.updateAll') }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="row">
            <h1>Szobák szerkesztése</h1>
            @foreach($rooms as $room)
                <div class="col-12 col-lg-6 mb-4">
                    <input type="text" class="form-control mb-2 bg-white fw-medium"
                        name="rooms[{{ $room->id }}][title]" 
                        value="{{ $room->title }}">
                    <textarea class="form-control mt-2 tinymce-editor" maxlength="150"
                        name="rooms[{{ $room->id }}][description]">{{ $room->description }}</textarea>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary mt-3">Mentés</button>
    </form>
</x-admin.layout>