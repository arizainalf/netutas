@extends('layouts.app')

@section('title', 'User')

@push('style')
@endpush

@section('main')
    <header id="fh5co-header" class="fh5co-cover" role="banner"
        style="background-image:url({{ asset('storage/img/sekolah/sekolah1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Pendidikan Adalah Pohon Kehidupan.</h1>
                            <h2>Williams Shakespeare.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-counter" class="fh5co-counters">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="473" data-speed="500"
                        data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Siswa</span>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="32" data-speed="40"
                        data-refresh-interval="10"></span>
                    <span class="fh5co-counter-label">Tenaga Pendidik</span>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <span class="fh5co-counter">A</span>
                    <span class="fh5co-counter-label">Akreditasi</span>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-explore" class="fh5co-bg-section">
        <div class="fh5co-explore fh5co-explore1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 animate-box">
                        <div class="mt">
                            <h3 class="text-center">Sambutan Kepala Sekolah</h3>
                            <p>{{ $profile['sambutan_kepsek'] }}</p>
                            <i>
                                <h3>{{ $kepsek['nama'] }}.</h3>
                            </i>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <img class="img-responsive" src="{{ asset('storage/img/sekolah/kepalasekolah.jpg') }}"
                            alt="work">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="fh5co-explore">
        <div class="fh5co-explore">
            <div class="container">
                <div class="row">
                    <div class="col-md-6  animate-box">
                        <img class="img-responsive" src="{{ asset('storage/img/sekolah/visi.jpg') }}" alt="work">
                    </div>
                    <div class="col-md-6 animate-box">
                        <div class="mt">
                            <div>
                                <h3>Visi</h3>
                                <p>{{ $profile['visi'] }} </p>
                                <h3>Misi</h3>
                                @foreach ($misi as $misi)
                                    <p> <i class="icon-dot-single"></i> {{ $misi['misi'] }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-project" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Prestasi</h2>
                    <p>Banyak anak-anak berprestasi yang berhasil menyalurkan bakatnya. Beberapa anak berhasil menorehkan
                        prestasi dan Mendapatkan Title Juara. </p>
                </div>
            </div>
        </div>
        <div class="container-fluid proj-bottom">
            <div class="row">
                @foreach ($prestasi as $prestasi)
                    <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                        <a href="#"><img src="{{ asset('storage/img/prestasi/' . $prestasi->image) }}"
                                alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                            <h3>{{ $prestasi->nama }}</h3>
                            <span>Tingkat {{ $prestasi->tingkat }}, {{ $prestasi->peraih }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="fh5co-testimonial">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                    <h2>Guru dan Staff</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row animate-box">
                        <div class="owl-carousel owl-carousel-fullwidth">
                            @foreach ($staff as $staff)
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="{{ asset('storage/img/staff/' . $staff->image) }}" alt="user">
                                        </figure>
                                        <span>{{ $staff->nama }}</span>
                                        <blockquote>
                                            <p>{{ $staff->jabatan->nama }}</p>
                                            <p>{{ $staff->mapel->nama ? 'Guru Mata Pelajaran : ' . $staff->mapel->nama : '' }}
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-blog" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Berita Terbaru</h2>
                    <p>Berita terbaru tentang SMP Negeri 7 Tasikmalaya.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $berita)
                    <div class="col-lg-4 col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="#"><img class="img-responsive"
                                    src="{{ asset('storage/img/berita/' . $berita->gambar) }}" alt=""></a>
                            <div class="blog-text">
                                <h3><a href=""#>{{ $berita->judul }}</a></h3>
                                <span class="posted_on">{{ $berita->created_at }}</span>
                                <span class="comment"><i class="icon-pencil"></i>{{ $berita->user->nama }}</span>
                                <p>{{ $berita->deskripsi }}</p>
                                <a href="{{ url('berita/' . $berita->slug) }}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div id="fh5co-started" style="background-image:url({{ asset('images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Lets Get Started</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                        provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <p><a href="#" class="btn btn-default btn-lg">Create A Free Course</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
