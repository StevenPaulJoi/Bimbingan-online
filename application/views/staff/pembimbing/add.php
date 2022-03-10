<div class="row mt-4 justify-content-center">
    <div class="col-md-5">
        <?= form_open(); ?>
        <div class="card">
            <div class="card-header">
                <h1 class="fs-4 mt-2">Form Proses Pengajuan</h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control form-control-user">
                        <option value="">-- Pilih Status --</option>
                        <option value="disetujui">Setuju</option>

                    </select>
                    <?= form_error('status'); ?>
                </div>
                <div id="formPembimbing" style="display:none">
                    <div class="mb-3">
                        <label for="dosen">Dosen Pembimbing Utama</label>
                        <select name="dosen" id="dosen" class="form-control">
                            <option value="">-- Pilih Dosen Pembimbing Utama --</option>
                            <?php foreach ($staff as $dosen): ?>
                                <option value="<?=$dosen->staff_id?>"><?= $dosen->display_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="asisten">Dosen Pembimbing Pendamping</label>
                        <select name="asisten" id="asisten" class="form-control">
                            <option value="">-- Pilih Dosen Pembimbing Pendamping --</option>
                            <?php foreach ($staff as $asisten): ?>
                                <option value="<?=$asisten->staff_id?>"><?= $asisten->display_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?=base_url('pengajuan/data')?>" class="btn btn-secondary">Batal</a>
                <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<script>
    const status = document.getElementById("status");
    const formPembimbing = document.getElementById("formPembimbing");
    status.addEventListener("change", function (){
        if(status.value == "disetujui") {
            formPembimbing.style.display = "block";
        } else {
            formPembimbing.style.display = "none";
        }
    });
</script>