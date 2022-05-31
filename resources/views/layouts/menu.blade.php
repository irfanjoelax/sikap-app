@role('admin')
<li class="side-menus {{ (url()->current() == url('/admin/home')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/admin/home') }}">
        <i class="fas fa-layer-group"></i><span>Home</span>
    </a>
</li>
<li class="menu-header">Master Data</li>
<li class="side-menus {{ (url()->current() == url('/admin/tugas')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/admin/tugas') }}">
        <i class="fas fa-file-contract"></i><span>Tugas</span>
    </a>
</li>
<li class="side-menus {{ (url()->current() == url('/admin/indikator')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/admin/indikator') }}">
        <i class="fas fa-list-ul"></i><span>Indikator</span>
    </a>
</li>
<li class="side-menus {{ (url()->current() == url('/admin/kegiatan')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/admin/kegiatan') }}">
        <i class="fas fa-book-reader"></i><span>Kegiatan</span>
    </a>
</li>
<li class="menu-header">Dashboard</li>
<li class="side-menus {{ (url()->current() == url('/admin/user')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/admin/user') }}">
        <i class="fas fa-users"></i><span>Daftar User</span>
    </a>
</li>
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-clipboard-list"></i><span>Rencana/Laporan</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{ url('/admin/rencana/dosen') }}">
            Dosen
        </a></li>
        <li><a class="nav-link" href="{{ url('/admin/rencana/tendik') }}">
            Tenaga Pendidik
        </a></li>
    </ul>
</li>
@endrole

@role('dosen')
<li class="menu-header">Utama</li>
<li class="side-menus {{ (url()->current() == url('/dosen/home')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/dosen/home') }}">
        <i class="fas fa-layer-group"></i><span>Home</span>
    </a>
</li>
<li class="menu-header">Dashboard</li>
<li class="side-menus {{ (url()->current() == url('/dosen/rencana')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/dosen/rencana') }}">
        <i class="fas fa-calendar-alt"></i><span>Rencana</span>
    </a>
</li>
<li class="side-menus {{ (url()->current() == url('/dosen/laporan')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/dosen/laporan') }}">
        <i class="fas fa-clipboard-list"></i><span>Laporan</span>
    </a>
</li>
@endrole

@role('tendik')
<li class="menu-header">Utama</li>
<li class="side-menus {{ (url()->current() == url('/tendik/home')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/tendik/home') }}">
        <i class="fas fa-layer-group"></i><span>Home</span>
    </a>
</li>
<li class="menu-header">Dashboard</li>
<li class="side-menus {{ (url()->current() == url('/tendik/rencana')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/tendik/rencana') }}">
        <i class="fas fa-calendar-alt"></i><span>Rencana</span>
    </a>
</li>
<li class="side-menus {{ (url()->current() == url('/tendik/laporan')) ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('/tendik/laporan') }}">
        <i class="fas fa-clipboard-list"></i><span>Laporan</span>
    </a>
</li>
@endrole
