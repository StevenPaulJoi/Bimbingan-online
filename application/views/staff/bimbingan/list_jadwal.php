<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="text-muted">List <?= $title; ?></h4>
    <div>
        <a href="<?=base_url('bimbingan/data')?>" class="btn btn-secondary">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
        <a href="<?=base_url('bimbingan/add_jadwal/').$detail['pengajuan_id']?>" class="btn btn-primary">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label for="npm">NPM</label>
                    <input value="<?=$detail['npm']?>" readonly type="text" id="npm" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="mahasiswa">Nama</label>
                    <input value="<?=$detail['nama_mahasiswa']?>" readonly type="text" id="mahasiswa" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md">
        <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl Bimbingan</th>
                    <th>Keterangan</th>
                    <th>Edit</th>
                    <th>Hapus</th>
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
                            <td class="text-center">
                                <a href="<?= base_url('bimbingan/edit_jadwal/').$row->jadwal_id; ?>" class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('bimbingan/delete_jadwal/').$row->jadwal_id; ?>" class="text-danger">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan='5' class="text-center">
                            Belum ada data
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="judul">Judul</label>
                    <input value="[<?=$detail['jenis_pengajuan']?>] <?=$detail['judul_pengajuan']?>" readonly type="text" id="judul" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea readonly class="form-control" id="deskripsi" rows="2"><?=$detail['deskripsi']?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>