@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin">Beranda</a></div>
                    <div class="breadcrumb-item">@yield('title')</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Data @yield('title')</h4>
                            </div>
                            <div class="card-body">
                                <form id="updateData">
                                    @method('PUT')
                                    <div class="form-group mb-1">
                                        <img src="{{ asset('storage/img/profil/' . $profileSekolah['logo_sekolah']) }}"
                                            alt="" class="img-thumbnail" width="200px">
                                    </div>
                                    <div class="form-group">

                                        <label for="image" class="form-label">Logo Sekolah</label>
                                        <input type="file" name="image" id="image" class="dropify"
                                            data-height="200">
                                        <small class="invalid-feedback" id="errorimage"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama Sekolah<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $profileSekolah['nama_sekolah'] }}">
                                        <small class="invalid-feedback" id="errornama"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah<span
                                                class="text-danger">*</span></label>
                                        <textarea name="alamat_sekolah" class="form-control summernote-simple" rows="30">{{ $profileSekolah['alamat_sekolah'] }}</textarea>
                                        <small class="invalid-feedback" id="erroralamat_sekolah"></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="sambutan" class="form-label">Sambutan Kepala Sekolah <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control summernote-simple" name="sambutan">{{ $profileSekolah['sambutan_kepsek'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="visi" class="form-label">Visi <span
                                                class="text-danger">*</span></label>
                                        <textarea class=" form-control summernote-simple" name="visi">{{ $profileSekolah['visi'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Data Kontak Sekolah</h4>
                            </div>
                            <div class="card-body">
                                <form id="updateKontak">
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $profileSekolah['email'] }}">
                                        <small class="invalid-feedback" id="erroremail"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telepon" class="form-label">Nomor Telepon<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                            value="{{ $profileSekolah['no_telepon'] }}">
                                        <small class="invalid-feedback" id="errorno_telepon"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="ig" class="form-label">Instagram<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="ig" name="ig"
                                            value="{{ $profileSekolah['ig'] }}">
                                        <small class="invalid-feedback" id="errorig"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook" class="form-label">Facebook<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{ $profileSekolah['facebook'] }}">
                                        <small class="invalid-feedback" id="errorfacebook"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube" class="form-label">Youtube<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="youtube" name="youtube"
                                            value="{{ $profileSekolah['youtube'] }}">
                                        <small class="invalid-feedback" id="erroryoutube"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter" class="form-label">X<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            value="{{ $profileSekolah['twitter'] }}">
                                        <small class="invalid-feedback" id="errortwitter"></small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success d-none d-lg-block">Simpan</button>
                                        <button type="submit"
                                            class="btn btn-success d-block w-100 d-lg-none">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>



    <script>
        $(document).ready(function() {
            $('.dropify').dropify();

            $("#updateData").submit(function(e) {
                setButtonLoadingState("#updateData .btn.btn-success", true);
                e.preventDefault();
                const url = `{{ route('admin.profil.sekolah') }}`;
                const data = new FormData(this);

                const successCallback = function(response) {
                    $('#image').parent().find(".dropify-clear").trigger('click');
                    setButtonLoadingState("#updateData .btn.btn-success", false);
                    handleSuccess(response, null, null, "no");
                    $(".img-navbar").css("background-image",
                        `url('/storage/img/profil/${response.data.image}')`);
                    location.reload(); // Refresh halaman setelah berhasil menyimpan

                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#updateData .btn.btn-success", false);
                    handleValidationErrors(error, "updateData", ["nama", "email", "image"]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });

            $("#updateKontak").submit(function(e) {
                setButtonLoadingState("#updateKontak .btn.btn-success", true);
                e.preventDefault();
                const url = `{{ route('admin.profil.sekolah.kontak') }}`;
                const data = new FormData(this);

                const successCallback = function(response) {
                    setButtonLoadingState("#updateKontak .btn.btn-success", false);
                    handleSuccess(response, null, null, "no");
                    $('#updateKontak .form-control').removeClass("is-invalid").val("");
                    $('#updateKontak .text-danger').html("");
                    location.reload(); // Refresh halaman setelah berhasil menyimpan
                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#updateKontak .btn.btn-success", false);
                    handleValidationErrors(error, "updateKontak", ["password_lama", "password"]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });
        });
    </script>
@endpush
