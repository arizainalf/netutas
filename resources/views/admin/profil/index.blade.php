@extends('layouts.admin')

@section('title', 'Profile')

@push('styles')
    <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
@endpush

@section('main')
    <div class="flex-grow-1 p-4">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Data @yield('title')</h4>
                    </div>
                    <div class="card-body">
                        <form id="updateData">
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ Auth::user()->nama }}">
                                <small class="invalid-feedback" id="errornama"></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                                <small class="invalid-feedback" id="erroremail"></small>
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
                        <h4 class="text-dark">Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        <form id="updatePassword">
                            @method('PUT')
                            <div class="form-group">
                                <label for="password_lama" class="form-label">Password Lama <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_lama" name="password_lama">
                                    <div class="input-group-append">
                                        <a class="btn bg-white d-flex justify-content-center align-items-center border"
                                            onclick="togglePasswordVisibility('#password_lama', '#toggle-password-lama'); event.preventDefault();">
                                            <i id="toggle-password-lama" class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <small class="text-danger" id="errorpassword_lama"></small>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password Baru <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password">
                                    <div class="input-group-append">
                                        <a class="btn bg-white d-flex justify-content-center align-items-center border"
                                            onclick="togglePasswordVisibility('#password', '#toggle-password'); event.preventDefault();">
                                            <i id="toggle-password" class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <small class="text-danger" id="errorpassword"></small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation">
                                    <div class="input-group-append">
                                        <a class="btn bg-white d-flex justify-content-center align-items-center border"
                                            onclick="togglePasswordVisibility('#password_confirmation', '#toggle-password-confirmation'); event.preventDefault();">
                                            <i id="toggle-password-confirmation" class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <small class="text-danger" id="errorpassword_confirmation"></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success d-none d-lg-block">Simpan</button>
                                <button type="submit" class="btn btn-success d-block w-100 d-lg-none">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#updatePassword").submit(function(e) {
                setButtonLoadingState("#updateKontak .btn.btn-success", true);
                e.preventDefault();

                // Send the data to the server
                const url = `{{ route('admin.profil.password') }}`;
                const data = new FormData(this);

                const successCallback = function(response) {
                    setButtonLoadingState("#updatePassword .btn.btn-success", false);
                    handleSuccess(response, null, null, "no");
                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#updatePassword .btn.btn-success", false);
                    handleValidationErrors(error, "updatePassword", ["password",
                        "password_confirmation"
                    ]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });

            // Append other form data
            $("#updateData").submit(function(e) {
                setButtonLoadingState("#updateData .btn.btn-success", true);
                e.preventDefault();

                // Send the data to the server
                const url = `{{ route('admin.profil') }}`;
                const data = new FormData(this);

                const successCallback = function(response) {
                    setButtonLoadingState("#updateData .btn.btn-success", false);
                    handleSuccess(response, null, null, "no");

                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#updateData .btn.btn-success", false);
                    handleValidationErrors(error, "updateData", ["nama", "email"]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });
        });
    </script>
@endpush
