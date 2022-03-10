<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted"><?= $bimbingan->judul_pengajuan; ?></h4>
    <div>
    </div>
</div>

<?= form_open(); ?>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <label for="status" class="col-md-4">Status</label>
                    <div class="col-md">
                        <select class="form-select" id="status" name="status">
                            <option <?= selected('revisi', $bimbingan->status_bimbingan); ?> value="revisi">REVISI</option>
                            <option <?= selected('done', $bimbingan->status_bimbingan); ?> value="done">DONE</option>
                        </select>
                        <?= form_error('status'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?=base_url('bimbingan/detail/').$bimbingan->pengajuan_id?>" class="btn btn-secondary">
                    Batal
                </a>
                <button type="submit" onclick="return confirm('Yakin ingin simpan data?')" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>