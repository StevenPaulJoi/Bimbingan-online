<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">Data <?= $title; ?></h4>
    <div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>No.</th>

                <th>Nama</th>
                <th>Jenis</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Proses</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($pengajuan) :
                $no = 1;
                foreach ($pengajuan as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= $row['nama_mahasiswa']; ?></td>
                        <td><?= $row['jenis_pengajuan']; ?></td>
                        <td><?= $row['judul_pengajuan']; ?></td>
                        <td><?= $row['deskripsi']; ?></td>
                        <td>
                            <?php
                            $color = [
                                'proses' => 'warning',
                                'disetujui' => 'primary',
                                'ditolak' => 'danger',
                                'selesai' => 'success'
                            ];
                            ?>
                            <span class="text-uppercase badge bg-<?= $color[$row['status']]; ?>">
                            <?= $row['status']; ?>
                        </span>
                        </td>
                        <td width="100">
                            <?php if ($row['status']=="proses"): ?>
                                <a href="<?= base_url('pembimbing/add/').$row['pengajuan_id']; ?>" class="btn btn-outline-success btn-sm">
                                    <i class="fa fa-sync"></i>
                                    Proses
                                </a>
                            <?php endif; ?>
                        </td>
                        <td width="100">
                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pengajuan/delete/').$row['pengajuan_id']; ?>" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
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