<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vezérlőpult') | Mura Vendégház</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @stack('styles')
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
          <div class="collapse d-lg-block p-3 sticky-top vh-100" id="sidebarMenu">
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
              <a class="nav-link text-white-50 hover-white {{ request()->routeIs('admin.bookings.index') ? 'active' : '' }} {{ request()->routeIs('admin.bookings.show') ? 'active' : '' }}" href="{{ route('admin.bookings.index') }}">
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
        
        <main class="col-12 col-lg-9">
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

  @stack('scripts')

</body>

</html>