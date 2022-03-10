<div class="container-fluid">
    <?php foreach($kelas as $kl): ?>
        <form action="<?= base_url('dashboard/update_kelas_aksi') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>ID Kelas</label>
                <input type="text" name="kelas_id" class="form-control" value="<?= $kl->kelas_id ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" value="<?= $kl->nama_kelas ?>">
            </div>
            <div class="form-group">
                <label for="kategori">Prodi</label>
                <select name="prodi_id" id="prodi_id" class="form-control form-control-user" required="">
                    <option value=""><?= $kl->prodi_id ?></option>
                    <?php
                    foreach ($prodi as $p) { ?>
                        <option value="<?= $p['prodi_id']; ?>"><?= $p['nama_prodi']; ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    <?php endforeach ; ?>
</div>