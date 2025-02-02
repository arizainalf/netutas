    <div class="sidebar p-3">
      <h5 class="text-center fw-bold">{{config('app.name')}}</h5>
      <nav class="nav flex-column">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}"><i class="bi bi-house"></i> Beranda</a>
        <a href="{{ route('admin.berita.index') }}" class="nav-link {{ Request::is('admin/berita') ?  'active' : (Request::is('admin/berita/*') ? 'active' : '' ) }}"><i class="bi bi-newspaper"></i> Berita</a>
        <a href="{{ route('admin.jabatan.index') }}" class="nav-link {{ Request::is('admin/jabatan') ?  'active' : (Request::is('admin/jabatan/*') ? 'active' : '' ) }}"><i class="bi bi-briefcase"></i> Jabatan</a>
        <a href="{{ route('admin.mapel.index') }}" class="nav-link {{ Request::is('admin/mapel') ?  'active' : (Request::is('admin/mapel/*') ? 'active' : '' ) }}"><i class="bi bi-book"></i> Mapel</a>
        <a href="{{ route('admin.staff.index') }}" class="nav-link {{ Request::is('admin/staff') ?  'active' : (Request::is('admin/staff/*') ? 'active' : '' ) }}"><i class="bi bi-people"></i> Staff & Guru</a>
        <a href="{{ route('admin.prestasi.index') }}" class="nav-link {{ Request::is('admin/prestasi') ?  'active' : (Request::is('admin/prestasi/*') ? 'active' : '' ) }}"><i class="bi bi-trophy"></i> Prestasi</a>
        <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::is('admin/user') ?  'active' : (Request::is('admin/user/*') ? 'active' : '' ) }}"><i class="bi bi-person"></i> User</a>
        <a href="{{ route('admin.profil') }}" class="nav-link {{ Request::is('admin/profil') ?  'active' : (Request::is('admin/profil/*') ? 'active' : '' ) }}"><i class="bi bi-person-circle"></i> Profile</a>
        <hr>
        <h6 class="px-3 text-muted">Manajemen Pengaturan</h6>
        <a href="{{ route('admin.profil.sekolah') }}" class="nav-link {{ Request::is('admin/profil-sekolah') ?  'active' : (Request::is('admin/profil-sekolah/*') ? 'active' : '' ) }}"><i class="bi bi-building"></i> Profile Sekolah</a>
        <a href="{{ route('admin.misi.index') }}" class="nav-link {{ Request::is('admin/misi') ?  'active' : (Request::is('admin/misi/*') ? 'active' : '' ) }}"><i class="bi bi-journal"></i> Misi</a>
      </nav>
      <div class="mt-auto p-3">
        <a href="{{ route('home') }}" class="btn btn-primary w-100 mb-2"><i class="bi bi-house-door"></i> Halaman Depan</a>
        <a href="{{ route('logout') }}" class="btn btn-secondary w-100"><i class="bi bi-box-arrow-left"></i> Keluar</a>
      </div>
    </div>
