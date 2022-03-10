<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= base_url('mahasiswa/index') ?>">SI Bimbingan</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="<?= base_url('autentifikasi/logout') ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link" href="<?= base_url('mahasiswa/index') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Master Data</div>
                <a class="nav-link" href="<?= base_url('mahasiswa/persyaratan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Persyaratan TA / PKMI
                </a>
                <a class="nav-link" href="<?= base_url('mahasiswa/input_ta') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Input Judul TA / PKMI
                </a>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="<?= base_url('mahasiswa/bimbingan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                    Kartu Bimbingan TA / PKMI
                </a>
                <a class="nav-link" href="<?= base_url('mahasiswa/pengajuan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Pengajuan Laporan TA / PKMI
                </a>
            </div>
        </div>
    </nav>
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="mt-4">Master Data</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Persyaratan TA/PKMI</li><br>
</ol>
    <h6>1.Sudah Menentukan Judul Tugas Akhir Atau Praktek Kerja Lapangan seperti Magang Industri</h6>
    <h6>2.Sudah Ada Trnaskip Nilai</h6>
    <h6>3.Sudah Melakukan Pembayaran SPP Dan Di Fotocopy</h6>
    <h6>4.Sudah Melakukan Pembayaran SKS Dan Di Fotocopy</h6>
    <h6>5.Print Out Krs Online</h6>

</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Sistem Informasi Bimbingan 2021</div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('assets/assets/demo/chart-bar-demo.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/datatables-simple-demo.js') ?>"></script>
</body>
</html>
