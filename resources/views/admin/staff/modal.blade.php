{{-- save-modal --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="label-modal"></span> @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="saveData" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <input type="hidden" id="userId" value="{{ auth()->user()->id }}">
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-danger" id="errorimage"></small>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <small class="invalid-feedback" id="errornama"></small>
                    </div>
                    <div class="mb-3">
                        <label for="id_jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <select name="id_jabatan" id="id_jabatan" class="form-control"></select>
                        <small class="invalid-feedback" id="errorid_jabatan"></small>
                    </div>
                    <div class="mb-3">
                        <label for="id_mapel" class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                        <select name="id_mapel" id="id_mapel" class="form-control"></select>
                        <small class="invalid-feedback" id="errorid_mapel"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end save-modal --}}
