<?php
include "config.php"; // Koneksi ke database

$query = "SELECT id, nama_lengkap, email, no_telepon, jenis_kelamin, status, tanggal_masuk FROM login ORDER BY tanggal_masuk DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link href="css/styles.css" rel="stylesheet"/>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        ::-webkit-scrollbar {
            width: 4px; /* Atur lebar scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: transparent; /* Membuat track scrollbar transparan */
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(20, 20, 20, 0.8); /* Warna gelap transparan */
        }

        /* Hover effect */
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(20, 20, 20, 0.8); /* Warna gelap transparan */
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="#">HALAMAN ADMIN</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
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
                        <a class="nav-link" href="halamanadmin.php">
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
                        <a class="nav-link" href="#">
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
                    <h1 class="mt-4">Halaman Data Login</h1>
                    <hr />
                    <div class="col-xl-20 col-md-20">
                        <div class="card bg-dark text-white mb-3 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Ikon di kiri -->
                                <i class="bi bi-people-fill fs-1"></i>
                                
                                <!-- Data jumlah login di kanan -->
                                <div class="text-end">
                                    <h5 class="mb-0">
                                        <?php
                                        include "config.php"; 
                                        $sql_count = "SELECT COUNT(*) as total FROM login";
                                        $result_count = $conn->query($sql_count);
                                        $row_count = $result_count->fetch_assoc();
                                        echo $row_count['total']; // Menampilkan jumlah user yang login
                                        ?>
                                    </h5>
                                    <small>Total Login</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Data Login
                        </div>
                        <div class="card-body">
                        <div class="card mb-3">
                            <input type="text" id="searchBox" class="form-control" placeholder="Cari data...">
                        </div>
                            <div class="table-responsive"style="max-height: 400px; overflow-y: auto;">
                                <table id="example" class="table table-striped table-bordered display nowrap">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Nomer Telepon</th>
                                            <th>Tanggal & Jam Masuk</th>
                                            <th>Tanggal & Jam Keluar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "config.php";
                                        $sql = "SELECT * FROM login";
                                        $result = $conn->query($sql);
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['no_telepon']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tanggal_masuk']) . "</td>";
                                            echo "<td>" . (!empty($row['tanggal_keluar']) ? htmlspecialchars($row['tanggal_keluar']) : '-') . "</td>";
                                            echo "<td> 
                                                    <button class='btn btn-danger btn-sm delete-btn' data-id='" . htmlspecialchars($row["id"]) . "'>
                                                        <i class='fas fa-trash'></i> Hapus
                                                    </button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/delete.js"></script>
    <script>$(document).ready(function () {
    $('#example').DataTable({
        paging: false,       // Hilangkan pagination
        searching: false,    // Hilangkan search box
        lengthChange: false, // Hilangkan dropdown jumlah entri
        info: false          // Hilangkan teks "Showing X to Y of Z entries"
        scrollX: false
    });
});
</script>
<script>
    $(document).ready(function () {
        $("#searchBox").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#example tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
</body>
</html>
