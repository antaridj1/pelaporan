<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('laporan.index')}}">
          <i class="bi bi-journal-text"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (auth()->user()->role === 'admin')
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('laporan.create')}}">
              <i class="bi bi-pencil"></i>
              <span>Buat Laporan</span>
            </a>
        </li><!-- End Dashboard Nav -->

      @elseif (auth()->user()->role === 'master_admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('pegawai.index')}}">
          <i class="bi bi-people"></i>
          <span>Pegawai</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('unit.index')}}">
          <i class="bi bi-bank"></i>
          <span>Unit BRI</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

    </ul>

  </aside><!-- End Sidebar-->