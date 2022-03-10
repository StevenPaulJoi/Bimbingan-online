<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <section class="section">
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#ProdiModal"><i class="fas fa-plus"></i>Tambah Program Studi</a><br><br>
        <table class="table table-striped table-responsive table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Program Studi</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
            $no = 1;
            foreach ($prodi as $pr) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pr->nama_prodi ?></td>
                    <td><a href="<?= base_url('dashboard/update_prodi/'). $pr->prodi_id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <a onclick="return confirm('Yakin Menghapus Data')" href="<?= base_url('dashboard/delete_prodi/'). $pr->prodi_id ?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

            <?php endforeach ; ?>
        </table>
    </section>
</div>


<div class="modal fade" id="ProdiModal" tabindex="-1" role="dialog" aria-labelledby="ProdiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Prodi</h5>
            </div>
            <form action="<?= base_url('dashboard/input_prodi_aksi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Program Studi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
