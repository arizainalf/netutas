@extends('layouts.admin')

@section('title', 'Prestasi')

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
                        {{-- <div class="mb-3">
                            <a href="{{ route('prestasi.show', 'pdf') }}" class="btn btn-sm px-3 btn-danger mr-1"
                                target="_blank"><i class="fas fa-file-pdf mr-2"></i>Pdf</a>
                            <a href="{{ route('prestasi.show', 'excel') }}" class="btn btn-sm px-3 btn-info"
                                target="_blank"><i class="fas fa-file-excel mr-2"></i>Excel</a>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="prestasi-table" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tingkat</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Peraih</th>
                                        <th scope="col">Dokumentasi</th>
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
    @include('admin.prestasi.modal')
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        let cropper;
        const imageInput = document.getElementById('gambar');
        const cropImageContainer = document.getElementById('image-crop-container');
        const imageCrop = document.getElementById('image-crop');

        imageInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files && files.length > 0) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageCrop.src = e.target.result;
                    cropImageContainer.style.display = 'block';
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(imageCrop, {
                        aspectRatio: 3 / 4,
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
            let url = "{{ route('admin.prestasi.store') }}";
            const data = new FormData(this);

            if (kode !== "") {
                data.append("_method", "PUT");
                url = `/admin/prestasi/${kode}`;
            }

            if (cropper) {
                cropper.getCroppedCanvas().toBlob(function(blob) {
                    data.append('gambar', blob);
                    sendData(url, data);
                });
            } else {
                sendData(url, data);
            }
        });

        function sendData(url, data) {
            const successCallback = function(response) {
                setButtonLoadingState("#saveData .btn.btn-success", false);
                handleSuccess(response, "prestasi-table", "createModal");
                location.reload(); // Refresh halaman setelah berhasil menyimpan

            };

            const errorCallback = function(error) {
                setButtonLoadingState("#saveData .btn.btn-success", false);
                handleValidationErrors(error, "saveData", ["nama", "tingkat", "deskripsi", "peraih", "gambar"]);
            };

            ajaxCall(url, "POST", data, successCallback, errorCallback);
        }

        $(document).ready(function() {
            $('.dropify').dropify();

            datatableCall('prestasi-table',
                '{{ route('admin.prestasi.index') }}',
                [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'tingkat',
                        name: 'tingkat'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'peraih',
                        name: 'peraih'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]);

            select2ToJson("#publisher", "{{ route('admin.prestasi.index') }}", "#createModal");
        });
    </script>
@endpush
