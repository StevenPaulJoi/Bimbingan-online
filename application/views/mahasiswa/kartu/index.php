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
                    <th>Cetak</th>
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
                    <td width="100">
                        <a target="_blank" href="<?= base_url('bimbingan/cetak/').$row['pengajuan_id']; ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-print"></i>
                            Cetak
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="10" class="text-center">
                        Belum ada data.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>