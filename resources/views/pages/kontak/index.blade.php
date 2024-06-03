@extends('layouts.app')

@section('title', 'Kontak Kami')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <h2>Hubungi Kami.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Informasi Kontak</h3>
                        <ul>
                            <li class="icon-map"><a
                                    href="https://maps.app.goo.gl/GgK5NJBVB9QWAf9p6">{{ $profile['alamat_sekolah'] }}</a>
                            </li>
                            <li class="icon-phone"><a href="tel://1234567920">{{ $profile['no_telepon'] }}</a></li>
                            <li class="icon-email"><a href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a></li>
                            <li class="icon-instagram"><a href="https://instagram.com/{{ $profile['ig'] }}" target="_blank">
                                    {{ $profile['ig'] }}</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-7 animate-box">
                    <h3>Get In Touch</h3>
                    <form action="mailto:{{ $profile['email'] }}">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" id="email" class="form-control" placeholder="Alamat Email Anda.">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="subject">Subject</label> -->
                                <input type="text" id="subject" name="subject" class="form-control"
                                    placeholder="Subjek Pesan Anda.">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="message">Message</label> -->
                                <textarea name="body" id="message" cols="30" rows="10" class="form-control"
                                    placeholder="Kritik dan Saran anda kami perlukan."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Kirim Pesan" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <div id="map" class="fh5co-map text-center">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3914490884695!2d108.2324304747609!3d-7.309845092698065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f50a987c65779%3A0xc30a896ac9732294!2sSMP%20Negeri%207%20Tasikmalaya!5e0!3m2!1sid!2sid!4v1717381152164!5m2!1sid!2sid"
            width="90%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/fontawsome/js/all.min.js') }}"></script>
@endpush
