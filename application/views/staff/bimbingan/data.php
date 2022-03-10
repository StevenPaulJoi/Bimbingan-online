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
                    <th>Jadwal</th>
                    <th>Aksi</th>
                    <th>Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($pengajuan) :
                $no = 1;
                foreach ($pengajuan as $row) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_mahasiswa; ?></td>
                    <td><?= $row->jenis_pengajuan; ?></td>
                    <td><?= $row->judul_pengajuan; ?></td>
                    <td><?= $row->deskripsi; ?></td>
                    <td width="100">
                        <a href="<?= base_url('bimbingan/jadwal/').$row->pengajuan_id; ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-calendar"></i>
                            Kelola
                        </a>
                    </td>
                    <td width="100">
                        <a href="<?= base_url('bimbingan/detail/').$row->pengajuan_id; ?>" class="btn btn-outline-success btn-sm">
                        <i class="fa fa-eye"></i>
                            Detail
                        </a>
                    </td>
                    <td width="100">
                        <a onclick="return confirm('Yakin ingin update status?')" href="<?= base_url('bimbingan/selesai/').$row->pengajuan_id; ?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-check"></i>
                            Selesai
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