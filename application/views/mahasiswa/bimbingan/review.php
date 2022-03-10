<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted"><?= $bimbingan->judul_pengajuan; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan/jadwal_mhs/').$bimbingan->pengajuan_id?>" class="btn btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Catatan</th>
                    <th>Reviewer</th>
                    <th>Status</th>
                    <th>Reviewed At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($review as $r) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $r->catatan; ?></td>
                        <td class="text-capitalize">
                             <b><?= $r->display_name; ?></b>
                        </td>
                        <td>
                            <?php if ($r->status_review == "ok") : ?>
                                <span class="badge bg-success">OK</span>
                            <?php else : ?>
                                <span class="badge bg-danger">REVISI</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $r->tgl_review; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>