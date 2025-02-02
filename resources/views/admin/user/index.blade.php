@extends('layouts.admin')

@section('title', 'User')

@push('styles')
    <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('library/datatables/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('library/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('library/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
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
                    <table class="table table-bordered table-striped" id="user-table" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" width="5%">#</th>
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

    @include('admin.user.modal')

@endsection

@push('scripts')
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('library/datatables/datatables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('library/datatables/DataTables-1.11.5/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('library/datatables/Select-1.3.3/js/dataTables.select.min.js') }}"></script> --}}
    <script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <script>
        let cropper;

        $(document).ready(function() {
            $('.dropify').dropify();


            $("#saveData").submit(function(e) {
                setButtonLoadingState("#saveData .btn.btn-success", true);
                e.preventDefault();
                // Send the data to the server
                let url = "{{ route('admin.user.store') }}";
                const id = $("#saveData #id").val();
                const data = new FormData(this);

                if (id) {
                    data.append("_method", "PUT");
                    url = `/admin/user/${id}`;
                }

                const successCallback = function(response) {
                    setButtonLoadingState("#saveData .btn.btn-success", false);
                    handleSuccess(response, "user-table", "createModal");
                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#saveData .btn.btn-success", false);
                    handleValidationErrors(error, "saveData", ["nama", "email", "password",
                        "role"
                    ]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });

            datatableCall('user-table', '{{ route('admin.user.index') }}', [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
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
