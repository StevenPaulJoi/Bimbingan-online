<div class="row">
    <div class="col-12">
        <div class="card">
            <?= form_open(); ?>
            <div class="card-body">
                <div class="mb-3">
                    <label for="prodi_id">Prodi</label>
                    <select name="prodi_id" class="form-control form-control-user">
                        <option value="" class="form-control">Pilih Prodi</option>
                        <?php foreach ($prodi as $p) : ?>
                            <option <?= selected($p->prodi_id, $kelas->prodi_id); ?> value="<?= $p->prodi_id; ?>"><?= $p->nama_prodi; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('prodi_id'); ?>
                </div>
                <div class="mb-3">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" value="<?= set_value('nama_kelas', $kelas->nama_kelas); ?>" class="form-control form-control-user" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas">
                    <?= form_error('nama_kelas'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>