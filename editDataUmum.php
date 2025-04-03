<?php
include "config.php"; // Koneksi ke database

// Cek apakah ada ID yang dikirim
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='halamanadmin.php';</script>";
    exit();
}

$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = "SELECT * FROM lainnya WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='halamanadmin.php';</script>";
    exit();
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }
        .absensi-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="absensi-container text-center bg-white">
    <h2 class="mb-4">Edit Absensi</h2>
    <form action="updateDataUmum.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="mb-2 form-floating">
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= htmlspecialchars($row['nama_lengkap']) ?>" required>
            <label for="nama_lengkap">Nama Lengkap</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="Laki-laki" <?= ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <label for="jenis_kelamin">Jenis Kelamin</label>
        </div>

        <div class="mb-2 form-floating">
            <input type="number" name="usia" id="usia" class="form-control" value="<?= $row['usia'] ?>" required>
            <label for="usia">Usia</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="status" id="status" class="form-select" required>
                <option value="Belum Menikah" <?= ($row['status'] == 'Belum Menikah') ? 'selected' : '' ?>>Belum Menikah</option>
                <option value="Sudah Menikah" <?= ($row['status'] == 'Sudah Menikah') ? 'selected' : '' ?>>Sudah Menikah</option>
            </select>
            <label for="status">Status</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="acara" id="acara" class="form-select" required>
                <option value="Kelompok" <?= ($row['acara'] == 'Kelompok') ? 'selected' : '' ?>>Kelompok</option>
                <option value="Desa" <?= ($row['acara'] == 'Desa') ? 'selected' : '' ?>>Desa</option>
                <option value="Daerah" <?= ($row['acara'] == 'Daerah') ? 'selected' : '' ?>>Daerah</option>
                <option value="Lainnya" <?= ($row['acara'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <label for="acara">Acara</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="keterangan" id="keterangan" class="form-select" required>
                <option value="Hadir" <?= ($row['keterangan'] == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
                <option value="Izin" <?= ($row['keterangan'] == 'Izin') ? 'selected' : '' ?>>Izin</option>
                <option value="Sakit" <?= ($row['keterangan'] == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
            </select>
            <label for="keterangan">Keterangan</label>
        </div>

        <div class="mb-3 form-floating" id="alasan-container" style="display: none;">
            <input type="text" name="alasan" id="alasan" class="form-control" value="<?= htmlspecialchars($row['alasan']) ?>">
            <label for="alasan">Alasan</label>
        </div>

        <input type="hidden" name="tanggal" id="tanggal">
        <input type="hidden" name="jam" id="jam">

        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
</div>

<script>
    function setLocalTime() {
        let now = new Date();
        document.getElementById('tanggal').value = now.toISOString().split('T')[0];
        document.getElementById('jam').value = now.toTimeString().split(' ')[0];
    }

    $(document).ready(function() {
        function toggleAlasan() {
            let keterangan = $("#keterangan").val();
            if (keterangan === "Izin" || keterangan === "Sakit") {
                $("#alasan-container").show();
                $("#alasan").prop("required", true);
            } else {
                $("#alasan-container").hide();
                $("#alasan").prop("required", false);
                $("#alasan").val(""); // Kosongkan jika status berubah ke "Hadir"
            }
        }

        $("#keterangan").change(toggleAlasan);
        toggleAlasan();
    });

    function validateForm() {
        let keterangan = document.getElementById("keterangan").value;
        let alasan = document.getElementById("alasan").value.trim();

        if ((keterangan === "Izin" || keterangan === "Sakit") && alasan === "") {
            alert("Silakan isi alasan jika status adalah Sakit atau Izin.");
            return false;
        }

        setLocalTime(); // Set tanggal dan jam sebelum submit
        return true;
    }
</script>

</body>
</html>
