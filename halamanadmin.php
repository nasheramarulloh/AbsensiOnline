<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Utama</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Bootstrap Icons CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">ABSENSI ADMIN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-left"></i> Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Halaman Utama
                            </a>
                            <a class="nav-link" href="dataPaud.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Paud
                            </a>
                            <a class="nav-link" href="dataCB.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Caberawit
                            </a>
                            <a class="nav-link" href="dataPraRemaja.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Pra Remaja
                            </a>
                            <a class="nav-link" href="dataRemaja.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Remaja
                            </a>
                            <a class="nav-link" href="dataPraNikah.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Pra Nikah
                            </a>
                            <a class="nav-link" href="dataUmum.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Umum
                            </a>
                            <a class="nav-link" href="dataPengurus.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database-check"></i></div>
                                Data Pengurus
                            </a>
                            <a class="nav-link" href="kategoriAkun.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-in-right"></i></div>
                                Data Login
                            </a>
                            <a class="nav-link" href="CatatanAdmin.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-text"></i></div>
                                Catatan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Halaman Absensi</h1>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"><i class="bi bi-people"></i> Absensi Umum</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="absensi_admin.php">Absen Sekarang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"><i class="bi bi-person"></i> Absensi Pengurus</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="absensi_Adminpengurus.php">Absen Sekarang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"><i class="bi bi-flag"></i> Tes Kemampuan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Lihat Sekarang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body"><i class="bi bi-card-text"></i> Catatan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="CatatanAdmin.php">Lihat Sekarang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

    </body>
</html>
