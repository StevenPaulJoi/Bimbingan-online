<?= form_open(); ?>
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label for="npm">NPM</label>
            <input type="text" class="form-control form-control-user" id="npm" name="npm" placeholder="Masukkan NPM">
            <?= form_error('npm'); ?>
        </div>
        <div class="mb-3">
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <input type="text" class="form-control form-control-user" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama">
            <?= form_error('nama_mahasiswa'); ?>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
            <?= form_error('password'); ?>
        </div>
        <div class="mb-3">
            <label for="prodi_id">Prodi</label>
            <select name="prodi_id" id="prodi_id" class="form-control">
                <option value="">-- Pilih Prodi --</option>
                <?php foreach ($prodi as $p) : ?>
                    <option value="<?= $p->prodi_id; ?>"><?= $p->nama_prodi; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('prodi_id'); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>
<?= form_close(); ?>