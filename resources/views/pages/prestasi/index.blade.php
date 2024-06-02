@extends('layouts.app')

@section('title', 'Prestasi')

@push('style')
@endpush

@section('main')
    <header id="fh5co-header" class="fh5co-cover mb-2" role="banner"
        style="background-image:url({{ asset('storage/img/sekolah/sekolah.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>@yield('title')</h1>
                            <h2>Banyak anak-anak berprestasi yang berhasil menyalurkan bakatnya. Beberapa anak berhasil
                                menorehkan
                                prestasi dan Mendapatkan Title Juara. </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="fh5co-project">
        <div class="container-fluid proj-bottom">
            <div class="row"> <!-- Start new row -->
                @foreach ($prestasis as $prestasi)
                    <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                        <a href=""><img src="{{ asset('storage/img/prestasi/' . $prestasi->image) }}"
                                alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                            <h2>{{ $prestasi->nama }}</h2>
                            <h3>Tingkat : {{ $prestasi->tingkat }}</h3>
                            <span>Diraih oleh : {{ $prestasi->peraih }}</span>
                        </a>
                    </div>
                @endforeach
            </div> <!-- Close the last row -->
            <div class="text-center">
                {{ $prestasis->links() }}
            </div>
        </div>
    </div>



@endsection

@push('scripts')
@endpush
