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

<div class="container-fluid mb-5" style="width: 90%;margin-left: 70px">
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
                                    NPM : <?= $detail['npm']; ?><br>
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
                            <table class="table mb-0 border-top table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th colspan="3">Jadwal Bimbingan</th>
                                    </tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari, Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach ($jadwal as $row): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= date('D, d F Y H:i:s', strtotime($row->tgl_mulai)); ?></td>
                                        <td><?= $row->keterangan; ?></td>
                                    </tr>                  
                                <?php endforeach; ?>      
                                </tbody>    
                            </table>      
                            <div class="my-4"></div>
                            <table class="table mb-0 border-top table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Catatan Pembimbing</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Review</th>
                                        <th>Catatan</th>
                                        <th>Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($review as $r): ?>
                                    <tr>
                                        <td><?= $r->tgl_review; ?></td>
                                        <td><?= $r->catatan; ?></td>
                                        <td><?= $r->display_name; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
            </div>
        </div>
    </div>
</body>

</html>