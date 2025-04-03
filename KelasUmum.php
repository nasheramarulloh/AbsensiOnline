<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>HALAMAN UM</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link href="css/styles.css" rel="stylesheet"/>

    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>

    <!-- jQuery & DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
        <a class="navbar-brand ps-3" href="#">HALAMAN UM</a>
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
                        <a class="nav-link" href="kelasPaud.php">
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
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Ruang Umum
                        </a>
                        <a class="nav-link" href="kelasPengurus.php">
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
                    <h1 class="mt-4">Absensi Umum</h1>
                    <hr />
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Kehadiran Umum
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
                                            <th>Acara</th> <!-- Tambahkan kolom Acara -->
                                            <th>Keterangan</th>
                                            <th>Alasan</th>
                                            <th>Tanggal & Jam</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include "config.php";

                                        // Pastikan query mengambil kolom 'acara'
                                        $query = "SELECT id, nama_lengkap, jenis_kelamin, usia, status, acara, keterangan, alasan, tanggal, jam FROM lainnya ORDER BY tanggal DESC";
                                        $result = $conn->query($query);

                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr data-id='" . $row['id'] . "'>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['usia']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['acara']) . "</td>"; // Tambahkan data acara
                                            echo "<td>" . htmlspecialchars($row['keterangan']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['alasan']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tanggal']) . " " . htmlspecialchars($row['jam']) . "</td>";
                                            echo "<td>
                                                        <button class='btn btn-primary btn-sm edit-btn' data-id='" . $row['id'] . "'>
                                                            <i class='fas fa-edit'></i> Edit
                                                        </button>
                                                    </td>";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
<script>
        window.addEventListener("beforeunload", function () {
    navigator.sendBeacon("logout_ajax.php");
});
</script>
<script>
    $(document).ready(function () {
    // Event listener untuk tombol Edit
    $("#example").on("click", ".edit-btn", function () {
        let id = $(this).data("id");

        // Arahkan ke halaman update.php dengan ID sebagai parameter
        window.location.href = "editUmum.php?id=" + id;
    });
});
$("#searchBox").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#example tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
</script>
</body>
</html>
