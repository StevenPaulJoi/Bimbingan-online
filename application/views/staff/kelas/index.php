<a href="<?=base_url('kelas/add')?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $title ?>
</a>
<div class="card">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Program Studi</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($kelas as $kl) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kl->nama_kelas ?></td>
                    <td><?= $kl->nama_prodi ?></td>
                    <td>
                        <a href="<?= base_url('kelas/edit/'). $kl->kelas_id ?>" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Yakin Menghapus Data')" href="<?= base_url('kelas/delete/'). $kl->kelas_id ?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>