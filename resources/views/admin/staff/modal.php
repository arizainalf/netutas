@extends('layouts.admin')

@section('title', 'Guru dan Staff Sekolah')

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
          {{-- <div class="mb-3">
                            <a href="{{ route('staff.show', 'pdf') }}" class="btn btn-sm px-3 btn-danger mr-1"
          target="_blank"><i class="fas fa-file-pdf mr-2"></i>Pdf</a>
          <a href="{{ route('staff.show', 'excel') }}" class="btn btn-sm px-3 btn-info" target="_blank"><i
              class="fas fa-file-excel mr-2"></i>Excel</a>
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
            <small class="text-danger" id="errorimage"></small>
          </div>
          <div class="form-group">
            <label for="nama" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama" name="nama">
            <small class="invalid-feedback" id="errornama"></small>
          </div>
          <div class="form-group">
            <label for="id_jabatan" class="form-label">Jabatan<span class="text-danger">*</span></label>
            <select name="id_jabatan" id="id_jabatan" class="form-control">
            </select>
            <small class="invalid-feedback" id="errorid_jabatan"></small>
          </div>
          <div class="form-group">
            <label for="id_mapel" class="form-label">Mata Pelajaran<span class="text-danger">*</span></label>
            <select name="id_mapel" id="id_mapel" class="form-control">
            </select>
            <small class="invalid-feedback" id="errorid_mapel"></small>
          </div>

          <label for="judul" class="form-label"><span class="text-danger">*</span> Wajib Diisi</label>

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

  datatableCall('staff-table', '{{ route('
    admin.staff.index ') }}', [{
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
  select2ToJson("#id_jabatan", "{{ route('admin.jabatan.index') }}", "#createModal");
  select2ToJson("#id_mapel", "{{ route('admin.mapel.index') }}", "#createModal");

  $("#saveData").submit(function(e) {
    setButtonLoadingState("#saveData .btn.btn-success", true);
    e.preventDefault();
    const kode = $("#saveData #id").val();
    let url = "{{ route('admin.staff.store') }}";
    const data = new FormData(this);

    if (kode !== "") {
      data.append("_method", "PUT");
      url = `staff/${kode}`;
    }

    const successCallback = function(response) {
      setButtonLoadingState("#saveData .btn.btn-success", false);
      handleSuccess(response, "staff-table", "createModal");
    };

    const errorCallback = function(error) {
      setButtonLoadingState("#saveData .btn.btn-success", false);
      handleValidationErrors(error, "saveData", ["nama", "image", "id_jabatan",
        "id_mapel"
      ]);
    };

    ajaxCall(url, "POST", data, successCallback, errorCallback);
  });
});
</script>
@endpush