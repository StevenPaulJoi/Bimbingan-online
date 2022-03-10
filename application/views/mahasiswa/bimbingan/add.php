<?= form_open('', ['autocomplete'=>'off']); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">Input <?= $title; ?></h4>
    <div>
        <a href="<?=base_url('pengajuan')?>" class="btn btn-sm btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="jenis_pengajuan" class="form-label">Jenis Pegajuan</label>
                        <select class="form-select" id="jenis_pengajuan" name="jenis_pengajuan">
                            <option selected value="">Pilih</option>
                            <option value="TA">TA / Tugas Akhir</option>
                            <option value="PKMI">PKMI / Praktek Kerja Magang Industri</option>
                        </select>
                        <?= form_error('jenis_pengajuan'); ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="judul_pengajuan" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul_pengajuan" name="judul_pengajuan">
                        <?= form_error('judul_pengajuan'); ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        <?= form_error('deskripsi'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="return confirm('Yakin ingin mengirim pengajuan?')" type="submit" class="btn btn-primary">
                    Kirim Pengajuan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>