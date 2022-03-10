<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">Buat <?= $title; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan/jadwal/').$detail['pengajuan_id']?>" class="btn btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>

<?= form_open(); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <input value="<?=set_value('tgl_mulai', $detail['tgl_mulai'])?>" type="text" name="tgl_mulai" id="tgl_mulai" class="form-control datetime">
                            <?= form_error('tgl_mulai'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="2"><?=set_value('keterangan', $detail['keterangan'])?></textarea>
                            <?= form_error('keterangan'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>