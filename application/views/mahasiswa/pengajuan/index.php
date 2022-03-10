<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">Data <?= $title; ?></h4>
    <div>
        <a href="<?=base_url('pengajuan')?>" class="btn btn-sm btn-secondary">
            <i class="fa fa-sync fa-sm text-white-50"></i> Muat Ulang
        </a>
        <a href="<?=base_url('pengajuan/add')?>" class="btn btn-sm btn-primary">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
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
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
        if ($pengajuan) :
        $no = 1;
        foreach ($pengajuan as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['jenis_pengajuan']; ?></td>
                    <td><?= $row['judul_pengajuan']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td>
                        <?php
                        $color = [
                            'proses' => 'warning',
                            'disetujui' => 'success',
                            'ditolak' => 'danger',
                            'selesai' => 'success'
                        ];
                        ?>
                        <span class="text-uppercase badge bg-<?= $color[$row['status']]; ?>">
                            <?= $row['status']; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">
                        Belum ada data.
                        <a href="<?= base_url('pengajuan/add'); ?>" class="text-decoration-none">Input Data</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>