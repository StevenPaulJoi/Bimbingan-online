<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">Data <?= $title; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan')?>" class="btn btn-sm btn-secondary">
            <i class="fa fa-sync fa-sm text-white-50"></i> Refresh
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis</th>
                    <th>Judul</th>
                    <th>Dosen Pembimbing Utama</th>
                    <th><i class="fa fa-cog"></i></th>
                    <th>Dosen Pembimbing Pendamping</th>
                    <th><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($pengajuan) :
                $no = 1;
                foreach ($pengajuan as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->jenis_pengajuan; ?></td>
                    <td><?= $row->judul_pengajuan; ?></td>
                    <td><?= $row->dospem; ?></td>
                    <td>
                        <a href="<?=base_url('bimbingan/jadwal_mhs_s/').$row->pengajuan_id; ?>" class="btn btn-primary btn-sm">
                            Lihat Detail
                        </a>
                    </td>
                    <td><?= $row->aspem; ?></td>
                    <td>
                        <a href="<?=base_url('bimbingan/jadwal_mhs/').$row->pengajuan_id; ?>" class="btn btn-primary btn-sm">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>