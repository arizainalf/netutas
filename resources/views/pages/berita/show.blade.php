@extends('layouts.app')

@section('title', 'Berita')

@push('style')
@endpush

@section('main')
    <header id="fh5co-header" class="fh5co-cover" role="banner"
        style="background-image:url({{ asset('storage/img/sekolah/sekolah.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>@yield('title')</h1>
                            <h2>Berita terbaru tentang SMP Negeri 7 Tasikmalaya.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="fh5co-explore" class="fh5co-bg-section">
        <div class="fh5co-explore fh5co-explore1">
            <div class="container">
                @foreach ($berita as $news)
                    <div class="row">
                        <div class="col-md-6 animate-box">
                            <img class="img-responsive" width="100%"
                                src="{{ asset('storage/img/berita/' . $news['gambar']) }}" alt="work">
                        </div>
                        <div class="col-md-6 animate-box">
                            <div class="mt">
                                <h3>{{ $news['judul'] }}</h3>
                                <p>{{ $news['deskripsi'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
