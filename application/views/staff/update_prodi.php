<div class="container-fluid">
    <?php foreach($prodi as $pr): ?>
    <form action="<?= base_url('dashboard/update_prodi_aksi') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>ID Prodi</label>
            <input type="text" name="prodi_id" class="form-control" value="<?= $pr->prodi_id ?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" value="<?= $pr->nama_prodi ?>">
        </div><br>
        <button class="btn btn-success" type="submit">Submit</button>
        </form>
    <?php endforeach ; ?>
</div>