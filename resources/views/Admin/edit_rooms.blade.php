<x-admin.layout>
    @section('title', 'Szobák Szerkesztése')
    <form action="{{ route('admin.rooms.updateAll') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="row">
            <h1>Szobák szerkesztése</h1>
            @foreach($rooms as $room)
                <div class="col-12 col-lg-6 mb-4 mt-2">
                    <div class="card w-100 h-100">
                        <div class="card-body bg-black bg-opacity-10">
                                <input type="text" class="form-control mb-2 bg-white fw-medium"
                                    name="rooms[{{ $room->id }}][title]" 
                                    value="{{ $room->title }}">
                                <textarea class="form-control mt-2 tinymce-editor" maxlength="150"
                                    name="rooms[{{ $room->id }}][description]">{{ $room->description }}</textarea>
                                <input type="file" name="rooms[{{ $room->id }}][image]" class="form-control mt-2">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success mt-3">Mentés</button>
    </form>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                plugins: 'lists link wordcount',
                toolbar: 'undo redo | bold italic | bullist numlist | removeformat',
                menubar: false,
                language: 'hu_HU',
                
                setup: function (editor) {
                    var maxCharacters = 150;

                    editor.on('keydown', function (e) {
                        var allowedKeys = [8, 46, 37, 38, 39, 40];
                        if (allowedKeys.indexOf(e.keyCode) !== -1) {
                            return;
                        }

                        var currentCount = editor.getContent({format: 'text'}).length;

                        if (currentCount >= maxCharacters) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        }
                    });

                    editor.on('change', function () {
                        editor.save(); 
                    });
                }
            });
        </script>
    @endpush

</x-admin.layout>