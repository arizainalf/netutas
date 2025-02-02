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
                        <label for="gambar" class="form-label">Dokumentasi</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                        <small class="text-danger" id="errorgambar"></small>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kejuaraan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <small class="invalid-feedback" id="errornama"></small>
                    </div>
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat <span class="text-danger">*</span></label>
                        <input name="tingkat" id="tingkat" class="form-control"></input>
                        <small class="invalid-feedback" id="errortingkat"></small>
                    </div>
                    <div class="mb-3">
                        <label for="peraih" class="form-label">Peraih <span class="text-danger">*</span></label>
                        <input name="peraih" id="peraih" class="form-control"></input>
                        <small class="invalid-feedback" id="errorperaih"></small>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <input name="deskripsi" id="deskripsi" class="form-control"></input>
                        <small class="invalid-feedback" id="errordeskripsi"></small>
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
