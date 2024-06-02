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
    <div id="fh5co-blog">
        <div class="container">
            @php $count = 0; @endphp
            @for ($i = 0; $i < count($beritas); $i++)
                @if ($count % 3 == 0)
                    <div class="row">
                @endif
                <div class="col-lg-4 col-md-4">
                    <div class="fh5co-blog animate-box">
                        <a href="#"><img class="img-responsive"
                                src="{{ asset('storage/img/berita/' . $beritas[$i]->gambar) }}" alt=""></a>
                        <div class="blog-text">
                            <h4><a href="#">{{ $beritas[$i]->judul }}</a></h4>
                            <span class="posted_on">{{ $beritas[$i]->created_at }}</span>
                            {{-- <span class="comment"><i class="icon-pencil"></i>{{ $beritas[$i]->user->nama }}</span> --}}
                            <p>{{ Str::limit($beritas[$i]->deskripsi, 20, '...') }}</p>
                            <a href="{{ url('berita/' . $beritas[$i]->slug) }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @php $count++; @endphp
                @if ($count % 3 == 0 || $i == count($beritas) - 1)
        </div>
        @endif
        @endfor
        <div class="text-center">
            {{ $beritas->links() }}
        </div>

    </div>
    </div>
@endsection

@push('scripts')
@endpush
