<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Halaman PraRemaja</title>
    
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
</style>

</head>
<body class="sb-nav-fixed">

    <!-- Navbar -->
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
    
    <!-- Sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
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
                        <a class="nav-link" href="#">
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

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Absensi Pra Remaja</h1>
                    <hr />
                    <div class="col-xl-20 col-md-20">
                        <div class="card bg-dark text-white mb-3 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Ikon di kiri -->
                                <div class="d-flex align-items-center">
                                    <div id="tanggal-windows"></div>
                                </div>

                                <!-- Data jumlah peserta Caberawit berdasarkan acara -->
                                <div class="text-end">
                                    <h5 class="mb-0">
                                        <?php
                                        include "config.php";

                                        // Query untuk menghitung peserta unik berdasarkan acara
                                        $sql_count = "
                                            SELECT 
                                                COUNT(DISTINCT CASE WHEN acara = 'Kelompok' THEN nama_lengkap END) AS kelompok,
                                                COUNT(DISTINCT CASE WHEN acara = 'Desa' THEN nama_lengkap END) AS desa,
                                                COUNT(DISTINCT CASE WHEN acara = 'Daerah' THEN nama_lengkap END) AS daerah,
                                                COUNT(DISTINCT CASE WHEN acara = 'Lainnya' THEN nama_lengkap END) AS lainnya
                                            FROM pra_remaja";

                                        $result_count = $conn->query($sql_count);
                                        $row_count = $result_count->fetch_assoc();

                                        echo "Kelompok: " . $row_count['kelompok'] . " | ";
                                        echo "Desa: " . $row_count['desa'] . " | ";
                                        echo "Daerah: " . $row_count['daerah'] . " | ";
                                        echo "Lainnya: " . $row_count['lainnya'];
                                        ?>
                                    </h5>
                                    <small>Total Peserta Caberawit Per Kategori Acara</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Absensi Pra Remaja
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
                                        $query = "SELECT id, nama_lengkap, jenis_kelamin, usia, status, acara, keterangan, alasan, tanggal, jam FROM pra_remaja ORDER BY tanggal DESC";
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
                                                    <button class='btn btn-primary btn-sm edit-btn mb-1' data-id='" . $row['id'] . "'>
                                                            <i class='fas fa-edit'></i> Edit
                                                    </button>
                                                    <br>
                                                    <button class='btn btn-danger btn-sm delete-btn' data-id='" . $row['id'] . "'>
                                                        <i class='fas fa-trash'></i> Hapus
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
    <script src="js/scripts.js"></script>
    <script>
$(document).ready(function () {
    // Hapus data
    $("#example").on("click", ".delete-btn", function () {
        let id = $(this).data("id");
        let row = $(this).closest("tr");

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "hapus_praremaja.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        if (response.trim() === "success") {
                            Swal.fire("Berhasil!", "Data telah dihapus.", "success").then(() => {
                                row.remove(); // Hapus baris dari tabel
                            });
                        } else {
                            Swal.fire("Gagal!", "Data tidak dapat dihapus.", "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "Terjadi kesalahan saat menghapus data.", "error");
                    }
                });
            }
        });
    });

    // Pencarian data
    $("#searchBox").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#example tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>
<script>
function updateDateTime() {
    let now = new Date();

    let options = {
        weekday: "long",  // Nama hari (Senin, Selasa, ...)
        year: "numeric",  // Tahun (2025)
        month: "long",    // Nama bulan (Maret, April, ...)
        day: "numeric",   // Tanggal (1, 2, 3, ...)
        hour: "2-digit",  // Jam (00 - 23)
        minute: "2-digit", // Menit (00 - 59)
        second: "2-digit", // Detik (00 - 59)
        hour12: false // Format 24 jam (false) atau 12 jam (true)
    };

    let formattedDateTime = new Intl.DateTimeFormat("id-ID", options).format(now);

    document.getElementById("tanggal-windows").innerText = formattedDateTime;
}

// Jalankan fungsi pertama kali saat halaman dimuat
updateDateTime();

// Perbarui tanggal & waktu setiap detik
setInterval(updateDateTime, 1000);
</script>
<script>
    $(document).ready(function () {
    // Event listener untuk tombol Edit
    $("#example").on("click", ".edit-btn", function () {
        let id = $(this).data("id");

        // Arahkan ke halaman update.php dengan ID sebagai parameter
        window.location.href = "editDataPraRemaja.php?id=" + id;
    });
});

</script>
</body>
</html>
