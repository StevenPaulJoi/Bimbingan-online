<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted"><?= $pengajuan['judul_pengajuan']; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan/data')?>" class="btn btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>
<table class="table table-bordered w-100 mb-0">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>File</th>
        <th class="text-center">
            <i class="fa fa-cog"></i>
            Aksi
        </th>
    </tr>
    <tbody>
        <?php if ($bimbingan): ?>
            <?php $no = 1; ?>
            <?php foreach ($bimbingan as $item) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item->tgl_bimbingan; ?></td>
                    <td>
                        <a target="_blank" href="<?= base_url('uploads/').$item->file_laporan; ?>" class="badge bg-primary text-decoration-none btn-primary">
                            <i class="fa fa-file-download"></i> Download
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('review/bimbingan/').$item->bimbingan_id; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Review
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>