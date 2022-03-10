<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted"><?= $bimbingan->judul_pengajuan; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan/detail/').$bimbingan->pengajuan_id?>" class="btn btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Input Catatan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="status_review">Status / Keterangan</label>
                        <select name="status_review" id="status_review" class="form-control">
                            <option value=""></option>
                            <option value="ok">Done</option>
                            <option value="revisi">REVISI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea required name="catatan" id="catatan" class="form-control" row="2"><?= set_value('catatan'); ?></textarea>
                        <?= form_error('catatan'); ?>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan 2</label>
                        <textarea required name="catatan_2" id="catatan_2" class="form-control" row="2"><?= set_value('catatan_2'); ?></textarea>
                        <?= form_error('catatan_2'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Reviewed At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($review as $r) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r->catatan; ?></td>
                                <td>
                                    <?php if ($r->status_review == "ok") : ?>
                                        <span class="badge bg-success">OK</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">REVISI</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $r->tgl_review; ?></td>
                                <td>
                                    <a href="<?=base_url('review/delete/').$r->review_id?>" onclick="return confirm('Yakin? ')" class="link-danger">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>