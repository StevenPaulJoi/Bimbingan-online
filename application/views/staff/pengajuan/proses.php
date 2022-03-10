<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">Proses <?= $title; ?></h4>
    <div>
        <a href="<?=base_url('pengajuan/data')?>" class="btn btn-sm btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Batal
        </a>
    </div>
</div>

<?= form_open(); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama</label>
                <input readonly type="text" class="form-control" id="nama_mahasiswa" value="<?=$pengajuan['nama_mahasiswa']?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="jenis_pengajuan" class="form-label">Jenis</label>
                <input readonly type="text" class="form-control" id="jenis_pengajuan" value="<?=$pengajuan['jenis_pengajuan']?>">
            </div>
            <div class="col-md-8 mb-3">
                <label for="judul_pengajuan" class="form-label">Judul</label>
                <input readonly type="text" class="form-control" id="judul_pengajuan" value="<?=$pengajuan['judul_pengajuan']?>">
            </div>
            <div class="col-md-12 mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea readonly class="form-control" id="deskripsi" rows="3"><?=$pengajuan['deskripsi']?></textarea>
            </div>
            <div class="col-md-5 mb-3">
                <label for="dosen_pembimbing" class="form-label">Pembimbing Utama</label>
                <select class="form-select" id="dosen_pembimbing" name="dosen_pembimbing">
                    <option selected value="">Pilih</option>
                    <?php foreach ($dosen as $d) : ?>
                    <option <?= selected($d->staff_id, $pengajuan['dosen_pembimbing']); ?> value="<?= $d->staff_id; ?>"><?= $d->display_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('dosen_pembimbing'); ?>
            </div>
            <div class="col-md-5 mb-3">
                <label for="asisten_pembimbing" class="form-label">Pembimbing Pendamping</label>
                <select class="form-select" id="asisten_pembimbing" name="asisten_pembimbing">
                    <option selected value="">Pilih</option>
                    <?php foreach ($asisten as $a) : ?>
                    <option <?= selected($a->staff_id, $pengajuan['asisten_pembimbing']); ?> value="<?= $a->staff_id; ?>"><?= $a->display_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('asisten_pembimbing'); ?>
            </div>
            <div class="col-md-2 mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option selected value="">Pilih</option>
                    <option <?= selected('proses', $pengajuan['status']); ?> value="proses">PROSES</option>
                    <option <?= selected('disetujui', $pengajuan['status']); ?> value="disetujui">SETUJUI</option>
                    <option <?= selected('ditolak', $pengajuan['status']); ?> value="ditolak">TOLAK</option>
                </select>
                <?= form_error('status'); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button onclick="return confirm('Yakin ingin menyimpan pengajuan?')" type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>
<?= form_close(); ?>