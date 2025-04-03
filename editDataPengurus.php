<?php
include "config.php"; // Koneksi ke database

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='halamanadmin.php';</script>";
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM absensi_pengurus WHERE id = ?";
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
            overflow-y: auto;
            max-height: 90vh;
        }
    </style>
</head>
<body>

<div class="absensi-container text-center">
    <h2 class="mb-4">Edit Data Absensi</h2>
    <form action="update_absensi_pengurus.php" method="post" onsubmit="setLocalTime()">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="mb-2 form-floating">
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required value="<?= $row['nama_lengkap'] ?>">
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
            <input type="number" name="usia" id="usia" class="form-control" placeholder="Usia" required value="<?= $row['usia'] ?>">
            <label for="usia">Usia</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="status" id="status" class="form-select" required>
                <option value="Belum Menikah" <?= ($row['status'] == 'Belum Menikah') ? 'selected' : '' ?>>Belum Menikah</option>
                <option value="Sudah Menikah" <?= ($row['status'] == 'Sudah Menikah') ? 'selected' : '' ?>>Sudah Menikah</option>
            </select>
            <label for="status">Status Pernikahan</label>
        </div>


        <div class="mb-2 form-floating">
            <select name="materi1" id="materi1" class="form-select kategori" required>
                <option value="<?= $row['materi1'] ?>" selected><?= $row['materi1'] ?></option>
                <option value="Organisasi">Materi Organisasi</option>
                <option value="Al-Qur'an">Al-Qur'an</option>
                <option value="Al-Hadist">Al-Hadist</option>
                <option value="Penasehat">Penasehat</option>
                <option value="CAI">Materi CAI</option>
                <option value="ASAD">Materi ASAD</option>
                <option value="PRAMUKA">Materi PRAMUKA</option>
                <option value="SENKOM">Materi SENKOM</option>
                <option value="FORSGI">Materi FORSGI</option>
                <option value="Lainnya">Materi Lainnya</option>
                <option value="Tidak Ada">Tidak Ada</option>
            </select>
            <label for="materi1">Materi 1</label>
        </div>

        <div class="mb-2 form-floating" id="keterangan-materi1" style="display: none;">
            <input type="text" name="keterangan_materi1" id="keterangan_materi1" class="form-control" placeholder="Keterangan Materi 1" value="<?= $row['keterangan_materi1'] ?>">
            <label for="keterangan_materi1">Keterangan Materi 1</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="materi2" id="materi2" class="form-select kategori" required>
                <option value="<?= $row['materi2'] ?>" selected><?= $row['materi2'] ?></option>
                <option value="Organisasi">Materi Organisasi</option>
                <option value="Al-Qur'an">Al-Qur'an</option>
                <option value="Al-Hadist">Al-Hadist</option>
                <option value="Penasehat">Penasehat</option>
                <option value="CAI">Materi CAI</option>
                <option value="ASAD">Materi ASAD</option>
                <option value="PRAMUKA">Materi PRAMUKA</option>
                <option value="SENKOM">Materi SENKOM</option>
                <option value="FORSGI">Materi FORSGI</option>
                <option value="Lainnya">Materi Lainnya</option>
                <option value="Tidak Ada">Tidak Ada</option>
            </select>
            <label for="materi2">Materi 2</label>
        </div>

        <div class="mb-2 form-floating" id="keterangan-materi2" style="display: none;">
            <input type="text" name="keterangan_materi2" id="keterangan_materi2" class="form-control" placeholder="Keterangan Materi 2" value="<?= $row['keterangan_materi2'] ?>">
            <label for="keterangan_materi2">Keterangan Materi 2</label>
        </div>

        <div class="mb-2 form-floating">
            <input type="text" name="acara" id="acara" class="form-control" placeholder="Acara" required value="<?= $row['acara'] ?>">
            <label for="acara">Acara</label>
        </div>

        <!-- Kehadiran -->
        <div class="mb-2 form-floating">
            <select name="keterangan_kehadiran" id="keterangan_kehadiran" class="form-select" required>
                <option value="Hadir" <?= ($row['keterangan_kehadiran'] == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
                <option value="Izin" <?= ($row['keterangan_kehadiran'] == 'Izin') ? 'selected' : '' ?>>Izin</option>
                <option value="Sakit" <?= ($row['keterangan_kehadiran'] == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
            </select>
            <label for="keterangan_kehadiran">Keterangan</label>
        </div>

        <div class="mb-3 form-floating" id="alasan-container" style="display: none;">
            <input type="text" name="alasan" id="alasan" class="form-control" placeholder="Alasan" value="<?= $row['alasan'] ?>">
            <label for="alasan">Alasan</label>
        </div>

        <input type="hidden" name="tanggal" id="tanggal" value="<?= $row['tanggal'] ?>">
        <input type="hidden" name="jam" id="jam" value="<?= $row['jam'] ?>">

        <button type="submit" class="btn btn-primary w-100">Perbaruin Absensi</button>
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
        let keterangan = $("#keterangan_kehadiran").val();
        if (keterangan === "Izin" || keterangan === "Sakit") {
            $("#alasan-container").show();
            $("#alasan").prop("required", true);
        } else {
            $("#alasan-container").hide();
            $("#alasan").prop("required", false);
            $("#alasan").val("");
        }
    }

    function handleMateriChange(materiId, keteranganId) {
        let selectedValue = $("#" + materiId).val();
        if (selectedValue === "Al-Qur'an" || selectedValue === "Al-Hadist") {
            $("#" + keteranganId).show();
            $("#" + keteranganId + " input").removeAttr("readonly");
        } else {
            $("#" + keteranganId).hide();
            $("#" + keteranganId + " input").val("").attr("readonly", true);
        }
    }

    $("#keterangan_kehadiran").change(toggleAlasan);
    
    // Event listener untuk masing-masing Materi
    $("#materi1").change(function() {
        handleMateriChange("materi1", "keterangan-materi1");
    });

    $("#materi2").change(function() {
        handleMateriChange("materi2", "keterangan-materi2");
    });

    // Panggil fungsi saat halaman pertama kali dimuat
    toggleAlasan();
    handleMateriChange("materi1", "keterangan-materi1");
    handleMateriChange("materi2", "keterangan-materi2");
});

</script>

</body>
</html>
