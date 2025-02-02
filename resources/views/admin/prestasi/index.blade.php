@extends('layouts.admin')

@section('title', 'Prestasi')

@push('styles')
    <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
@endpush

@section('main')
    <div class="flex-grow-1 p-4">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title fw-bold mb-0">
                    Data @yield('title')
                </h5>
                <div class="ms-auto">
                    <button class="btn btn-success" onclick="getModal('createModal')"><i
                            class="fas fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
            <div class="card-body">
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

    @include('admin.prestasi.modal')

@endsection

@push('scripts')
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <script>
        $(document).ready(function() {

            select2ToJson("#id_jabatan", "{{ route('admin.jabatan.index') }}", "#createModal");
            select2ToJson("#id_mapel", "{{ route('admin.mapel.index') }}", "#createModal");

            datatableCall('prestasi-table', '{{ route('admin.prestasi.index') }}', [{
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


            $("#saveData").submit(function(e) {
                setButtonLoadingState("#saveData .btn.btn-success", true);
                e.preventDefault();
                const kode = $("#saveData #id").val();
                let url = "{{ route('admin.prestasi.store') }}";
                const data = new FormData(this);

                if (kode !== "") {
                    data.append("_method", "PUT");
                    url = `/admin/prestasi/${kode}`;
                }

                const successCallback = function(response) {
                    $('#saveData #image').parent().find(".dropify-clear").trigger('click');
                    setButtonLoadingState("#saveData .btn.btn-success", false);
                    handleSuccess(response, "prestasi-table", "createModal");
                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#saveData .btn.btn-success", false);
                    handleValidationErrors(error, "saveData", ["image", "nama", "jabatan_id",
                        "mapel_id"
                    ]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });

        });
    </script>
@endpush
