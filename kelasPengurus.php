<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Halaman PraNikah</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link href="css/styles.css" rel="stylesheet"/>

    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>

    <!-- jQuery & DataTables -->
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
        position: relative;
    }

    .table thead {
        position: sticky;
        top: 0;
        background: #343a40; /* Warna background header agar tetap terlihat */
        color: white;
        z-index: 10;
    }
    #tanggal-windows {
        font-size: 14px;
        font-weight: bold;
        color: #ffffff;
    }
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

    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="#">HALAMAN PGRS</a>
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
    
    <!-- Sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Halaman Utama
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="bi bi-backpack"></i></div>
                            Kelas Paud
                        </a>
                        <a class="nav-link" href="kelasCB.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-backpack"></i></div>
                            Kelas CB
                        </a>
                        <a class="nav-link" href="kelasPraRemaja.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-backpack"></i></div>
                            Kelas Pra Remaja
                        </a>
                        <a class="nav-link" href="kelasRemaja.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-backpack"></i></div>
                            Kelas Remaja
                        </a>
                        <a class="nav-link" href="kelasPraNikah.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-backpack"></i></div>
                            Kelas Pra Nikah
                        </a>
                        <a class="nav-link" href="kelasUmum.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Ruang Umum
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-check"></i></div>
                            Ruang Pengurus
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Absensi Pengurus</h1>
                    <hr />
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Kehadiran Pengurus
                        </div>
                        <div class="card-body">
                        <div class="mb-3" style="width: 100%;">
                            <input type="text" id="searchBox" class="form-control" placeholder="Cari data...">
                        </div>
                            <div class="table-responsive " style="max-height: 400px; overflow-y: auto;">
                                <table id="example" class="table table-striped table-bordered display nowrap">
                                <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Usia</th>
                                            <th>Status</th>
                                            <th>Materi 1</th>
                                            <th>Keterangan</th>
                                            <th>Materi 2</th>
                                            <th>Keterangan</th>
                                            <th>Acara</th> <!-- Tambahkan kolom Acara -->
                                            <th>Keterangan</th>
                                            <th>Alasan</th>
                                            <th>Tanggal & Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "config.php";

                                        // Pastikan query mengambil semua kolom yang diperlukan dari tabel 'absensi_pengurus'
                                        $query = "SELECT id, nama_lengkap, jenis_kelamin, usia, status, acara, keterangan_kehadiran AS keterangan, alasan, tanggal, jam, 
                                                        materi1, keterangan_materi1, materi2, keterangan_materi2 
                                                FROM absensi_pengurus ORDER BY tanggal DESC";

                                        $result = $conn->query($query);

                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr data-id='" . $row['id'] . "'>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['usia']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['materi1']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['keterangan_materi1']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['materi2']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['keterangan_materi2']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['acara']) . "</td>"; // Tambahkan data acara
                                            echo "<td>" . htmlspecialchars($row['keterangan']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['alasan']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tanggal']) . " " . htmlspecialchars($row['jam']) . "</td>";
                                            echo "</tr>";
                                        }

                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap & Custom Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
         window.addEventListener("beforeunload", function () {
    navigator.sendBeacon("logout_ajax.php");
});
    </script>
    <script>
        $("#searchBox").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#example tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
    </script>
</body>
</html>
