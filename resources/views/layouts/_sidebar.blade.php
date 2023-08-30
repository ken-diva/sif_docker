<ul class="menu">
  <li class="sidebar-title">Main menu</li>

  {{-- <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }}">
    <a href="/" class='sidebar-link'>
      <i class="bi bi-grid-fill"></i>
      <span>Dashboard</span>
    </a>
  </li> --}}

  {{-- <li class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
      <i class="bi bi-briefcase-fill"></i>
      <span>Sekretariat (local)</span>
    </a>
    <ul class="submenu {{ str_contains($title, 'Sekre |') ? 'active' : '' }}">
      <li class="submenu-item {{ str_contains($title, 'Sekre | Dashboard') ? 'active' : '' }}">
        <a href="/sekre/dashboard">Dashboard</a>
      </li>
      <li class="submenu-item">
        <a href="https://onedrive.live.com/about/en-us/signin/" target="_blank">Link Repo (OneDrive)</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'Sekre | Notula') ? 'active' : '' }}">
        <a href="/sekre/notula">Notula</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'Sekre | Surat Tugas') ? 'active' : '' }}">
        <a href="/sekre/st">Surat Tugas</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'Sekre | Surat Keputusan') ? 'active' : '' }}">
        <a href="/sekre/sk">Surat Keputusan</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'Sekre | Buku Ajar') ? 'active' : '' }}">
        <a href="/sekre/ba">Buku Ajar</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'Sekre | Peminjaman Ruang Rapat') ? 'active' : '' }}">
        <a href="/sekre/prr">Peminjaman Ruang Rapat</a>
      </li>
      <li class="submenu-item">
        <a href="/sekre/cari_stsk">Cari ST/SK Dosen</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'Sekre | MoU MoA') ? 'active' : '' }}">
        <a href="#">MoU/MoA</a>
      </li>
    </ul>
  </li> --}}

  <li class="sidebar-item has-sub {{ str_contains($title, 'SDM') ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
      <i class="bi bi-gear-fill"></i>
      <span>SDM</span>
    </a>
    <ul class="submenu {{ str_contains($title, 'SDM |') ? 'active' : '' }}">
      <li class="submenu-item {{ str_contains($title, 'SDM | Dashboard') ? 'active' : '' }}">
        <a href="/sdm/dashboard">Dashboard</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'SDM | Data Dosen') ? 'active' : '' }}">
        <a href="/sdm/data-dosen">Data Dosen</a>
      </li>
      <li class="submenu-item {{ str_contains($title, 'SDM | Data TPA') ? 'active' : '' }}">
        <a href="/sdm/data-tpa">Data TPA</a>
      </li>
    </ul>
  </li>

</ul>
