<div class="row">
    <div class="col-12">
        <div class="card">
            <?= form_open(); ?>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama_prodi">Nama Prodi</label>
                    <input type="text" value="<?= set_value('nama_prodi'); ?>" class="form-control form-control-user" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Prodi">
                    <?= form_error('nama_prodi'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>