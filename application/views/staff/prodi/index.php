<a href="<?=base_url('prodi/add')?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $title ?>
</a>
<div class="card">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Program Studi</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            foreach ($prodi as $pr) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pr->nama_prodi ?></td>
                    <td><a href="<?= base_url('prodi/edit/'). $pr->prodi_id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <a onclick="return confirm('Yakin Menghapus Data')" href="<?= base_url('prodi/delete/'). $pr->prodi_id ?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>