<div class="container-fluid">
    <?php foreach($mahasiswa as $mh): ?>
        <form action="<?= base_url('dashboard/update_mahasiswa_aksi') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>ID Mahasiswa</label>
                <input type="text" name="mhs_id" class="form-control" value="<?= $mh->mhs_id ?>" readonly>
            </div>
            <div class="form-group">
                <label>NPM</label>
                <input type="text" name="npm" class="form-control" value="<?= $mh->npm ?>">
            </div>
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" class="form-control" value="<?= $mh->nama_mahasiswa ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?= $mh->password ?>">
            </div>
            <div class="form-group">
                <label for="kategori">ID Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control form-control-user" required="">
                    <option value=""><?= $mh->kelas_id ?></option>
                    <?php
                    foreach ($kelas as $k) { ?>
                        <option value="<?= $k['kelas_id']; ?>"><?= $k['kelas_id']; ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    <?php endforeach ; ?>
</div>