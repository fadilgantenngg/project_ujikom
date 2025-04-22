<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{ asset('path/to/logo.png') }}" alt="Logo" width="40">
          </span>

        <span class="app-brand-text demo menu-text fw-bolder ms-2">Cinema Indo</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="index.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Master</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('kategori.index')}}" class="menu-link">
              <div data-i18n="Without menu">Kategori</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('genre.index') }}" class="menu-link">
              <div data-i18n="Without navbar">Genre</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('film.index')}}" class="menu-link">
              <div data-i18n="Container">Film</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('review.index')}}" class="menu-link">
              <div data-i18n="Fluid">Review</div>
            </a>
          </li>

  </aside>
