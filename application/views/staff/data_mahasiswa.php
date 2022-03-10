<div class="container-fluid">
    <section class="section">
        <?= $this->session->flashdata('pesan') ?>
        <a class="btn btn-success" href="" data-toggle="modal" data-target="#MahasiswaModal"><i class="fas fa-plus"></i>Tambah Mahasiswa</a><br><br>
        <table class="table table-striped table-responsive table-bordered">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Password</th>
                <th>ID Kelas</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
            $no = 1;
            foreach ($mahasiswa as $mh) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $mh->npm ?></td>
                    <td><?= $mh->nama_mahasiswa ?></td>
                    <td> ************* </td>
                    <td><?= $mh->kelas_id ?></td>
                    <td><a href="<?= base_url('dashboard/update_mahasiswa/'). $mh->mhs_id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <a onclick="return confirm('Yakin')" href="<?= base_url('dashboard/delete_mahasiswa/'). $mh->mhs_id ?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

            <?php endforeach ; ?>
        </table>
    </section>
</div>

<div class="modal fade" id="MahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="MahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Mahasiswa</h5>
            </div>
            <form action="<?= base_url('dashboard/input_mahasiswa_aksi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="npm" name="npm" placeholder="Masukkan NPM">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                    </div>
                </div>
                <div class="form-group">
                    <select name="kelas_id" class="form-control form-control-user">
                        <option value="" class="form-control">Pilih Kelas</option>
                        <?php
                        foreach ($kelas as $k) { ?>
                            <option value="<?= $k['kelas_id']; ?>"><?= $k['kelas_id']; ?></option>
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
