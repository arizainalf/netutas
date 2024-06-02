<div class="modal fade" role="dialog" id="createModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="label-modal"></span> Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="saveData" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="form-group">
                        <label for="gambar" class="form-label">Dokumentasi </label>
                        <input type="file" name="gambar" id="gambar" class="dropify" data-height="200">
                        <small class="text-danger" id="errorgambar"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Prestasi <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <small class="invalid-feedback" id="errornama"></small>
                    </div>
                    <div class="form-group">
                        <label for="tingkat" class="form-label">Tingkat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tingkat" name="tingkat">
                        <small class="invalid-feedback" id="errortingkat"></small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <small class="invalid-feedback" id="errordeskripsi"></small>
                    </div>
                    <div class="form-group">
                        <label for="peraih" class="form-label">Peraih <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="peraih" name="peraih">
                        <small class="invalid-feedback" id="errorperaih"></small>
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
