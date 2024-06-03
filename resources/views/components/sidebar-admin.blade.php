<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/admin">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/admin">7Tas</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-dashboard"></i><span>Beranda</span></a>
            </li>
            <li class="{{ Request::is('admin/berita') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/berita') }}"><i class="fa-regular fa-newspaper"></i>
                    <span>Berita</span></a>
            </li>
            {{-- <li class="{{ Request::is('admin/ekstrakurikuler') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/ekstrakurikuler') }}"><i class="fa-solid fa-people-roof"></i>
                    <span>Ekstrakurikuler</span></a>
            </li> --}}
            <li class="{{ Request::is('admin/jabatan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/jabatan') }}"><i class="fa-solid fa-user-check"></i>
                    <span>Jabatan</span></a>
            </li>
            <li class="{{ Request::is('admin/mapel') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/mapel') }}"><i class="fa-solid fa-chalkboard-user"></i>
                    <span>Mapel</span></a>
            </li>
            <li class="{{ Request::is('admin/staff') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/staff') }}"><i class="fa-solid fa-users-line"></i>
                    <span>Staff & Guru</span></a>
            </li>
            <li class="{{ Request::is('admin/prestasi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/prestasi') }}"><i class="fa-solid fa-trophy"></i>
                    <span>Prestasi</span></a>
            </li>
            <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/user') }}"><i class="fa-solid fa-users"></i>
                    <span>User</span></a>
            </li>
            <li class="{{ Request::is('admin/profil') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/profil') }}"><i class="fa-regular fa-id-badge"></i>
                    <span>Profile</span></a>
            </li>
            <li class="menu-header">Manajemen Pengaturan</li>
            <li class="{{ Request::is('admin/profil-sekolah') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/profil-sekolah') }}"><i class="fa-solid fa-gear"></i>
                    <span>Profile Sekolah</span></a>
            </li>
            <li class="{{ Request::is('admin/profil-sekolah') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/profil-sekolah') }}"><i class="fa-solid fa-gear"></i>
                    <span>Visi Misi</span></a>
            </li>
            <div class="hide-sidebar-mini mt-2 mb-2 p-2">
                <a href="{{ url('') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fa-solid fa-house"></i> Halaman Depan
                </a>
                <a href="{{ url('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar
                </a>
            </div>
        </ul>
    </aside>
</div>
