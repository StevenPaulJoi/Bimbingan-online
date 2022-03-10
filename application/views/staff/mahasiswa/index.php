<a href="<?=base_url('mahasiswa/add')?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $title ?>
</a>
<div class="card">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPM/Username</th>
                    <th>Nama Mahasiswa</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $no = 1;
            foreach ($mahasiswa as $mh) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $mh->npm ?></td>
                    <td><?= $mh->nama_mahasiswa ?></td>
                    <td><?= $mh->password ?></td>
                    <td><a href="<?= base_url('mahasiswa/edit/'). $mh->mhs_id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <a onclick="return confirm('Yakin')" href="<?= base_url('mahasiswa/delete/'). $mh->mhs_id ?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>