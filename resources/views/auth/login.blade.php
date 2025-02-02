<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4 text-center" style="width: 350px;">
            {{-- <img src="logo.png" alt="Logo" class="mb-3" style="width: 60px;"> --}}
            <h5 class="fw-bold">Selamat Datang di</h5>
            <h3 class="fw-bold text-primary">Website {{ config('app.name') }}</h3>
            {{-- <p class="text-muted"></p> --}}
            <form id="login" autocomplete="off">
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan email Anda">
                    <small class="invalid-feedback" id="erroremail"></small>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password Anda">
                    </div>
                    <small class="text-danger" id="errorpassword"></small>
                </div>
                <button type="submit" class="btn btn-success w-100 mb-2">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </button>
                <a href="#" class="btn btn-primary w-100">
                    <i class="bi bi-house"></i> Kembali Ke Halaman Utama
                </a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#login").submit(function(e) {
                setButtonLoadingState("#login .btn.btn-danger", true, "Masuk");
                e.preventDefault();
                const url = "{{ route('login') }}";
                const data = new FormData(this);

                const successCallback = function(response) {
                    setButtonLoadingState("#login .btn.btn-danger", false,
                        "<i class='fas fa-sign-in mr-2'></i>Masuk");
                    handleSuccess(response, null, null, "/admin");
                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#login .btn.btn-danger", false,
                        "<i class='fas fa-sign-in mr-2'></i>Masuk");
                    handleValidationErrors(error, "login", ["email", "password"]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });
        });
    </script>
</body>

</html>
