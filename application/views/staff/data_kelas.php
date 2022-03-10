<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <section class="section">
        <a class="btn btn-success" href="" data-toggle="modal" data-target="#KelasModal"><i class="fas fa-plus"></i>Tambah Kelas</a><br><br>
        <table class="table table-striped table-responsive table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Program Studi</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
            $no = 1;
            foreach ($kelas as $kl) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kl->nama_kelas ?></td>
                    <td><?= $kl->prodi_id ?></td>
                    <td><a href="<?= base_url('dashboard/update_kelas/'). $kl->kelas_id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <a onclick="return confirm('Yakin Menghapus Data')" href="<?= base_url('dashboard/delete_kelas/'). $kl->kelas_id ?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

            <?php endforeach ; ?>
        </table>
    </section>
</div>


<div class="modal fade" id="KelasModal" tabindex="-1" role="dialog" aria-labelledby="KelasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Kelas</h5>
            </div>
            <form action="<?= base_url('dashboard/input_kelas_aksi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas">
                    </div>
                </div>
                <div class="form-group">
                    <select name="prodi_id" class="form-control form-control-user">
                        <option value="" class="form-control">Pilih Prodi</option>
                        <?php
                        foreach ($prodi as $p) { ?>
                            <option value="<?= $p['prodi_id']; ?>"><?= $p['nama_prodi']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
