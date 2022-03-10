<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $detail['jenis_pengajuan']; ?> - <?= $detail['nama_mahasiswa'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Fira Sans Condensed', sans-serif;
        }
    </style>
</head>

<body onload="window.print()">
<style>
    td{
        text-align: center;
    }
</style>

<h2 style="text-align: center">Kartu Bimbingan Mahasiswa Tugas Akhir/PKMI</h2><br>
<h2 style="text-align: center">Program Studi DIII Management Infomartika Univeritas Pakuan</h2>

<div class="container- fluid" style="width: 90%;margin-left: 70px">
    <div class="container-fluid" style="width: 100%; padding: 0">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="<?= base_url('assets/logo.jpg') ?>" width="10%" height="50" align="Left">
                <center><h3><i class="fa fa-table"></i> Kartu Bimbingan</h3></center>
                <hr>

                            <div class="card-header text-center">
                                Kartu Bimbingan <?= $detail['jenis_pengajuan']; ?>
                            </div>
                            <div class="card-body">                                
                                <p class="card-text pt-2">
                                    Nama : <?= $detail['nama_mahasiswa']; ?><br>
                                    NPM : <?= $detail['npm']; ?>
                                    Judul : "<?= $detail['judul_pengajuan']; ?>"
                                    <br>                                    
                                </p>
                                <p class="card-text pt-2">
                                    Dosen Pembimbing Utama : <?= $detail['dospem']; ?>
                                    <br>
                                    Dosen Pembimbing Pendamping  : <?= $detail['aspem']; ?>
                                </p>
                            </div>
                            <br>
                            <table class="table mb-0 border-top table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Hari, Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Nama Dosen Pembimbing</th>
                                </tr>
                                <?php foreach ($jadwal as $j): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?= date('d/M/Y', strtotime($j->tgl_mulai)); ?></td><?php endforeach; ?>
                                        <td><?= $review['catatan']; ?></td>
                                        <td><?= $detail['dospem']; ?></td>
                                    </tr>
                                    <?php foreach ($jadwal as $j): ?>
                                    <tr>
                                        <td>2</td>
                                        <td><?= date('d/M/Y', strtotime($j->tgl_mulai)); ?></td><?php endforeach; ?>
                                        <td><?= $review['status_review']; ?></td>
                                        <td><?= $detail['aspem']; ?></td>
                                    </tr>                                
                            </table>                
            </div>
        </div>
    </div>
</body>

</html>