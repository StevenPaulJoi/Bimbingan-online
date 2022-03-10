<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted"><?= $detail['judul_pengajuan']; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan')?>" class="btn btn-sm btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered w-100">
            <tr>
                <th>NPM</th>
                <td><?= $detail['npm']; ?></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td><?= $detail['nama_mahasiswa']; ?></td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table table-bordered w-100">
            <tr>
                <th>Dosen Pembimbing Pendamping</th>
                <td><?= $detail['aspem']; ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h5 class="text-dark">Jadwal Bimbingan</h5>
        </div>
        <table class="table table-bordered w-100 mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Deadline</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($jadwal) :
                $no = 1;
                foreach ($jadwal as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->tgl_mulai; ?></td>
                      <td><?= $row->keterangan; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan='5' class="text-center">
                        Belum ada jadwal
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-8">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <div>
                <h5 class="text-dark mb-0">Upload Laporan</h5>
                <small class="text-muted">Allowed: pdf/doc/docx</small>
            </div>
            <div>
                <?= form_open_multipart(); ?>
                <div class="input-group input-group-sm">
                    <input name="file_laporan" type="file" class="form-control" aria-label="Upload">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-upload"></i> Upload
                    </button>
                </div>
                <?= form_close(); ?>
                <?= $upload_errors; ?>
            </div>
        </div>
        <table class="table table-bordered w-100 mb-0">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>File</th>
                <th>Catatan</th>
            </tr>
            <tbody>
                <?php if ($bimbingan): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($bimbingan as $item) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $item->tgl_bimbingan; ?></td>
                            <td>
                                <a target="_blank" href="<?= base_url('uploads/').$item->file_laporan; ?>" class="badge bg-danger text-decoration-none btn-danger">
                                    <i class="fa fa-file-pdf"></i> Download
                                </a>
                            </td>
                            <td>
                                <a href="<?=base_url('review/show/').$item->bimbingan_id?>" class="btn btn-sm btn-outline-primary">
                                    Lihat Review
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>