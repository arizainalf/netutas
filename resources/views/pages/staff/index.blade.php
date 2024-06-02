@extends('layouts.app')

@section('title', 'Staff dan Guru')

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
            @php $count = 0; @endphp
            @foreach ($staffs as $staff)
                @if ($count % 6 == 0)
                    @if ($count != 0)
        </div> <!-- Close previous row -->
        @endif
        <div class="row"> <!-- Start new row -->
            @endif
            <div class="col-md-2 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a href="#"><img src="{{ asset('storage/img/staff/' . $staff->image) }}" alt=""
                        class="img-responsive">
                    <h2>{{ $staff->nama }}</h2>
                    <h3>Jabatan :{{ $staff->jabatan->nama }}</h3>
                    <span>Mengajar Mata Pelajaran : {{ $staff->mapel->nama }}</span>
                </a>
            </div>
            @php $count++; @endphp
            @endforeach
        </div> <!-- Close the last row -->
        <div class="text-center">
            {{ $staffs->links() }}
        </div>
    </div>
    </div>



@endsection

@push('scripts')
@endpush
