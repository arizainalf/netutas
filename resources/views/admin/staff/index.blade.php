@extends('layouts.admin')

@section('title', 'Guru dan Staff Sekolah')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <style>
        .cropper-container {
            max-width: 100%;
        }

        .cropper-canvas {
            width: 100% !important;
        }

        .modal-body {
            overflow: hidden;
        }

        .crop-container {
            display: none;
            max-width: 100%;
            overflow: hidden;
        }

        #crop-image {
            max-width: 100%;
        }
    </style>
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
                            <a href="{{ route('staff.show', 'pdf') }}" class="btn btn-sm px-3 btn-danger mr-1"
                                target="_blank"><i class="fas fa-file-pdf mr-2"></i>Pdf</a>
                            <a href="{{ route('staff.show', 'excel') }}" class="btn btn-sm px-3 btn-info"
                                target="_blank"><i class="fas fa-file-excel mr-2"></i>Excel</a>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="staff-table" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col" width="10%">Foto</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Mengajar Mata Pelajaran</th>
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
    @include('admin.staff.modal')
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
        $(document).ready(function() {
            // Inisialisasi dropify
            $('.dropify').dropify();

            // Inisialisasi DataTables
            datatableCall('staff-table', '{{ route('admin.staff.index') }}', [{
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
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'mapel',
                    name: 'mapel'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]);

            // Inisialisasi Select2
            select2ToJson("#id_jabatan", "{{ route('admin.jabatan.index') }}", "#createModal");
            select2ToJson("#id_mapel", "{{ route('admin.mapel.index') }}", "#createModal");

            // Inisialisasi Cropper.js
            let cropper;
            const image = document.getElementById('image');
            const cropImage = document.getElementById('crop-image');
            const cropContainer = document.getElementById('crop-container');

            image.addEventListener('change', function(e) {
                const files = e.target.files;
                const done = url => {
                    image.value = '';
                    cropImage.src = url;
                    cropImage.style.display = 'block';
                    cropContainer.style.display = 'block';

                    // Inisialisasi cropper dengan opsi tambahan
                    cropper = new Cropper(cropImage, {
                        aspectRatio: 3 / 4,
                        viewMode: 1,
                        movable: true,
                        zoomable: true,
                        scalable: true,
                        cropBoxResizable: true
                    });
                };
                let reader;
                let file;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            // Reset modal saat dibuka kembali
            $('#createModal').on('hidden.bs.modal', function() {
                // Hancurkan instance cropper jika ada
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }

                // Kosongkan elemen input file dan gambar
                image.value = '';
                cropImage.src = '';
                cropImage.style.display = 'none';
                cropContainer.style.display = 'none';
            });

            // Simpan data dengan gambar yang dipotong
            $("#saveData").submit(function(e) {
                e.preventDefault();
                setButtonLoadingState("#saveData .btn.btn-success", true);

                const kode = $("#saveData #id").val();
                let url = "{{ route('admin.staff.store') }}";
                const data = new FormData(this);

                if (kode !== "") {
                    data.append("_method", "PUT");
                    url = `staff/${kode}`;
                }

                if (cropper) {
                    cropper.getCroppedCanvas().toBlob((blob) => {
                        data.append('image', blob);

                        const successCallback = function(response) {
                            setButtonLoadingState("#saveData .btn.btn-success", false);
                            handleSuccess(response, "staff-table", "createModal");
                            location.reload(); // Refresh halaman setelah berhasil menyimpan
                        };

                        const errorCallback = function(error) {
                            setButtonLoadingState("#saveData .btn.btn-success", false);
                            handleValidationErrors(error, "saveData", ["nama", "image",
                                "id_jabatan", "id_mapel"
                            ]);
                        };

                        ajaxCall(url, "POST", data, successCallback, errorCallback);
                    });
                } else {
                    const successCallback = function(response) {
                        setButtonLoadingState("#saveData .btn.btn-success", false);
                        handleSuccess(response, "staff-table", "createModal");
                        location.reload(); // Refresh halaman setelah berhasil menyimpan
                    };

                    const errorCallback = function(error) {
                        setButtonLoadingState("#saveData .btn.btn-success", false);
                        handleValidationErrors(error, "saveData", ["nama", "image", "id_jabatan",
                            "id_mapel"
                        ]);
                    };

                    ajaxCall(url, "POST", data, successCallback, errorCallback);
                }
            });
        });
    </script>
@endpush
