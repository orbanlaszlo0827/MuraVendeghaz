<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vezérlőpult') | Mura Vendégház</title>

    @if (request()->routeIs('admin.gallery.index'))
      <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endif

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-lg-none bg-dark text-white p-3 d-flex justify-content-between align-items-center">
          <span class="h5 m-0">Admin Panel</span>
          <button
            class="btn btn-outline-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu"
            aria-expanded="false"
            aria-controls="sidebarMenu"
          >
            <i class="bi bi-list">Menü</i>
          </button>
        </div>

        <div class="col-lg-3 bg-dark text-white sidebar-container p-0">
          <div class="collapse d-lg-block p-3 sticky-top" id="sidebarMenu">
            <h3 class="h4 mb-4 d-none d-lg-block border-bottom pb-3">
              Admin Panel
            </h3>

            <nav class="nav flex-column gap-2">
              <a class="nav-link text-white-50 hover-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Vezérlőpult
              </a>
              <a class="nav-link text-white-50 hover-white" href="#">
                <i class="bi bi-calendar2-week me-2"></i> Naptár nézet
              </a>
              <a class="nav-link text-white-50 hover-white" href="#">
                <i class="bi bi-calendar-check me-2"></i> Foglalások
              </a>
              <a class="nav-link text-white-50 hover-white {{ request()->routeIs('admin.rooms.index') ? 'active' : '' }}" href="{{ route('admin.rooms.index') }}">
                <i class="bi bi-houses me-2"></i>Szobák szerkesztése
              </a>
              <a class="nav-link text-white-50 hover-white {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">
                <i class="bi bi-card-image me-2"></i>Galéria kezelő
              </a>
              <a class="nav-link text-white-50 hover-white {{ request()->routeIs('admin.prices.index') ? 'active' : '' }}" href="{{ route('admin.prices.index') }}">
                <i class="bi bi-cash me-2"></i> Árak és Beállítások
              </a>
              <hr class="my-4">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link text-white-50 hover-white w-100 text-start" type="submit">
                  <i class="bi bi-arrow-90deg-left me-2"></i>Vissza a publikus oldalra
                </button>
              </form>
            </nav>
          </div>
        </div>
        <main class="col-12 col-xl-7 offset-xl-1 col-lg-9 py-3">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          {{ $slot }}
        </main>
        
      </div>
    </div>
    @if (request()->routeIs('admin.rooms.index'))
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
    @endif

    @if (request()->routeIs('admin.gallery.index'))
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
    @endif
</body>

</html>