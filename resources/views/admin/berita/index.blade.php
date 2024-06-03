@extends('layouts.admin')

@section('title', 'Berita')

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
                            <table class="table table-bordered table-striped" id="berita-table" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col" width="10%">Gambar</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Diterbitkan</th>
                                        <th scope="col">Penerbit</th>
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
    <div>
    </div>

    @include('admin.berita.modal')

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
        const imageInput = document.getElementById('gambar');
        const cropImageContainer = document.getElementById('image-crop-container');

        imageInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files && files.length > 0) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-crop').src = e.target.result;
                    cropImageContainer.style.display = 'block';
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(document.getElementById('image-crop'), {
                        aspectRatio: 4 / 3,
                        viewMode: 1
                    });
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $("#saveData").submit(function(e) {
            e.preventDefault();
            setButtonLoadingState("#saveData .btn.btn-success", true);

            const kode = $("#saveData #id").val();
            let url = "{{ route('admin.berita.store') }}";
            const data = new FormData(this);

            if (kode !== "") {
                data.append("_method", "PUT");
                url = `/admin/berita/${kode}`;
            }

            if (cropper) {
                cropper.getCroppedCanvas({
                    width: 300,
                    height: 300
                }).toBlob(function(blob) {
                    data.append('image', blob);

                    sendData(url, data);
                });
            } else {
                sendData(url, data);
            }
        });

        function sendData(url, data) {
            const successCallback = function(response) {
                setButtonLoadingState("#saveData .btn.btn-success", false);
                handleSuccess(response, "berita-table", "createModal");
            };

            const errorCallback = function(error) {
                setButtonLoadingState("#saveData .btn.btn-success", false);
                handleValidationErrors(error, "saveData", ["judul", "deskripsi", "gambar"]);
            };

            ajaxCall(url, "POST", data, successCallback, errorCallback);
        }

        $(document).ready(function() {
            $('.dropify').dropify();
            datatableCall('berita-table', '{{ route('admin.berita.index') }}', [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'published_at',
                    name: 'published_at'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]);
            select2ToJson("#publisher", "{{ route('admin.berita.index') }}", "#createModal");
        });
    </script>
@endpush
