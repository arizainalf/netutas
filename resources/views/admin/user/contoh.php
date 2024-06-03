@extends('layouts.admin')

@section('title', 'User')

@push('style')
<link rel="stylesheet" href="{{ asset('library/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/dropify/css/dropify.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
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

<div class="modal fade" role="dialog" id="createModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span id="label-modal"></span> Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="saveData" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" id="id">
          <div class="form-group">
            <label for="image" class="form-label">Foto </label>
            <input type="file" name="image" id="image" class="dropify" data-height="200">
            <small class="invalid-feedback" id="errorimage"></small>
          </div>
          <div class="form-group">
            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama" name="nama">
            <small class="invalid-feedback" id="errornama"></small>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email">
            <small class="invalid-feedback" id="erroremail"></small>
          </div>
          <div class="form-group">
            <label for="password" class="form-label">Password Baru <span class="text-danger">*</span></label>
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
            <div class="input-group">
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
              <div class="input-group-append">
                <a class="btn bg-white d-flex justify-content-center align-items-center border"
                  onclick="togglePasswordVisibility('#password_confirmation', '#toggle-password-confirmation'); event.preventDefault();">
                  <i id="toggle-password-confirmation" class="fas fa-eye"></i>
                </a>
              </div>
            </div>
            <small class="invalid-feedback" id="errorpassword_confirmation"></small>
          </div>

          <div class="form-group">
            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
            <select name="role" id="role" class="form-control">
              <option value=""> -- Pilih Role --</option>
              <option value="User">User</option>
              <option value="Admin">Admin</option>
            </select>
            <small class="invalid-feedback" id="errorrole"></small>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('library/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('library/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('library/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('library/dropify/js/dropify.js') }}"></script>
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

<script>
$(document).ready(function() {
  $('.dropify').dropify();

  datatableCall('user-table', '{{ route('
    admin.user.index ') }}', [{
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

  $("#saveData").submit(function(e) {
    setButtonLoadingState("#saveData .btn.btn-success", true);
    e.preventDefault();
    const kode = $("#saveData #id").val();
    let url = "{{ route('admin.user.store') }}";
    const data = new FormData(this);

    if (kode !== "") {
      data.append("_method", "PUT");
      url = `/admin/user/${kode}`;
    }

    const successCallback = function(response) {
      setButtonLoadingState("#saveData .btn.btn-success", false);
      handleSuccess(response, "user-table", "createModal");
    };

    const errorCallback = function(error) {
      setButtonLoadingState("#saveData .btn.btn-success", false);
      handleValidationErrors(error, "saveData", ["nama", "role", "email",
        "password", "image"
      ]);
    };

    ajaxCall(url, "POST", data, successCallback, errorCallback);
  });
});
</script>
@endpush