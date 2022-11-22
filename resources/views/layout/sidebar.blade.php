<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if (auth()->user()->role === 'admin')
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('laporan.create')}}">
              <i class="bi bi-pencil"></i>
              <span>Buat Laporan</span>
            </a>
        </li><!-- End Dashboard Nav -->
      @endif
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('laporan.index')}}">
          <i class="bi bi-journal-text"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->