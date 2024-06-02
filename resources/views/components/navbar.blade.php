<nav class="fh5co-nav" role="navigation">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <p class="num">{{ $profile['no_telepon'] }}</p>
                    <ul class="fh5co-social">
                        <li><a href="https://www.instagram.com/{{ $profile['ig'] }}" target="_blank"><i
                                    class="icon-instagram"></i> {{ $profile['ig'] }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-11">
                    <div id="fh5co-logo"><a href="index.html">SMPN 7 TASIKMALAYA <span>.</span></a></div>
                </div>
                <div class="col-xs-1 col-md-6 text-right menu-1">
                    <ul>
                        <li class="{{ Request::is('') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{ Request::is('prestasi') ? 'active' : '' }}"><a
                                href="{{ route('prestasi') }}">Prestasi</a></li>
                        <li class="{{ Request::is('berita') ? 'active' : '' }}"><a
                                href="{{ route('berita') }}">Berita</a></li>
                        <li class="{{ Request::is('staff') ? 'active' : '' }}"><a href="{{ route('staff') }}">Staff</a>
                        </li>
                        <li><a href="contact.html">Kontak</a></li>
                        <li class="btn-cta"><a
                                href="{{ auth()->user() ? url('admin') : url('login') }}"><span>{{ auth()->user() ? 'Dashboard' : 'Login' }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>
