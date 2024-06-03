@extends('layouts.admin')

@section('title', 'User')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title font-weight-bolder">
                            Data @yield('title')
                        </div>
                        <div class="ml-auto">
                            <button class="btn btn-success" onclick="getModal('createModal')"><i
                                    class="fas fa-plus mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="user-table" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col" width="10%">Gambar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.user.modal')
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <script>
        let cropper;

        $(document).ready(function() {
            $('.dropify').dropify();

            $("#image").on("change", function(e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image-crop-container").show();
                        $("#image-crop").attr("src", e.target.result);
                        cropper = new Cropper(document.getElementById("image-crop"), {
                            aspectRatio: 1,
                            viewMode: 1
                        });
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $("#crop-image-btn").on("click", function() {
                const canvas = cropper.getCroppedCanvas({
                    width: 300,
                    height: 300
                });
                canvas.toBlob(function(blob) {
                    const formData = new FormData();
                    formData.append("image", blob);

                    // Append other form data
                    $("#saveData").serializeArray().forEach(field => {
                        formData.append(field.name, field.value);
                    });

                    // Send the data to the server
                    let url = "{{ route('admin.user.store') }}";
                    const id = $("#saveData #id").val();
                    if (id) {
                        formData.append("_method", "PUT");
                        url = `/admin/user/${id}`;
                    }

                    const successCallback = function(response) {
                        $('#image').parent().find(".dropify-clear").trigger('click');
                        $("#image-crop-container").hide();
                        cropper.destroy();
                        setButtonLoadingState("#saveData .btn.btn-success", false);
                        handleSuccess(response, "user-table", "createModal");
                    };

                    const errorCallback = function(error) {
                        setButtonLoadingState("#saveData .btn.btn-success", false);
                        handleValidationErrors(error, "saveData", ["nama", "email", "password",
                            "role", "image"
                        ]);
                    };

                    ajaxCall(url, "POST", formData, successCallback, errorCallback);
                });
            });

            $("#saveData").submit(function(e) {
                e.preventDefault();
                if (!cropper) {
                    alert("Please select and crop an image first.");
                    return;
                }
                $("#crop-image-btn").trigger("click");
            });

            datatableCall('user-table', '{{ route('admin.user.index') }}', [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]);
        });
    </script>
@endpush
