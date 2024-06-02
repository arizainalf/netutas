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
                    <div class="form-group crop-container" id="crop-container">
                        <img id="crop-image" src="" alt="Crop Image">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <small class="invalid-feedback" id="errornama"></small>
                    </div>
                    <div class="form-group">
                        <label for="id_jabatan" class="form-label">Jabatan<span class="text-danger">*</span></label>
                        <select name="id_jabatan" id="id_jabatan" class="form-control"></select>
                        <small class="invalid-feedback" id="errorid_jabatan"></small>
                    </div>
                    <div class="form-group">
                        <label for="id_mapel" class="form-label">Mata Pelajaran<span
                                class="text-danger">*</span></label>
                        <select name="id_mapel" id="id_mapel" class="form-control"></select>
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
