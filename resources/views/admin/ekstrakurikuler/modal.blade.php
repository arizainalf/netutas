<div class="modal fade" role="dialog" id="createModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="label-modal"></span> Ekstrakurikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="saveData" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="form-group">
                        <label for="gambar" class="form-label">Gambar </label>
                        <input type="file" name="gambar" id="gambar" class="dropify" data-height="200">
                        <small class="text-danger" id="errorgambar"></small>
                    </div>
                    <div class="form-group">
                        <label for="judul" class="form-label">Nama Ekstrakurikuler <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <small class="invalid-feedback" id="errorjudul"></small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <small class="invalid-feedback" id="errordeskripsi"></small>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp">
                        <small class="invalid-feedback" id="errortelp"></small>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small class="invalid-feedback" id="erroremail"></small>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook">
                        <small class="invalid-feedback" id="errorfacebook"></small>
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram">
                        <small class="invalid-feedback" id="errorinstagram"></small>
                    </div>
                    <div class="form-group">
                        <label for="x" class="form-label">X</label>
                        <input type="text" class="form-control" id="x" name="x">
                        <small class="invalid-feedback" id="errorx"></small>
                    </div>
                    <div class="form-group">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube">
                        <small class="invalid-feedback" id="erroryoutube"></small>
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
