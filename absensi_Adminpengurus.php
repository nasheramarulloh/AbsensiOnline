<?php
include "config.php"; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama_lengkap'] ?? "");
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin'] ?? "");
    $usia = $_POST['usia'] ?? "";
    $status = htmlspecialchars($_POST['status'] ?? "");
    $materi1 = htmlspecialchars($_POST['materi1'] ?? "");
    $keterangan_materi1 = htmlspecialchars($_POST['keterangan_materi1'] ?? ""); // User mengisi sendiri
    $materi2 = htmlspecialchars($_POST['materi2'] ?? "");
    $keterangan_materi2 = htmlspecialchars($_POST['keterangan_materi2'] ?? ""); // User mengisi sendiri
    $keterangan_kehadiran = htmlspecialchars($_POST['keterangan_kehadiran'] ?? ""); // Ditambahkan sesuai struktur
    $alasan = htmlspecialchars($_POST['alasan'] ?? "");
    $acara = htmlspecialchars($_POST['acara'] ?? "");
    $tanggal = htmlspecialchars($_POST['tanggal'] ?? date("Y-m-d"));
    $jam = htmlspecialchars($_POST['jam'] ?? date("H:i:s"));

    // Validasi wajib isi
    if (empty($nama) || empty($jenis_kelamin) || empty($usia) || empty($status) || empty($materi1) || empty($materi2) || empty($keterangan_kehadiran) || empty($acara) || empty($tanggal) || empty($jam)) {
        echo "<script>alert('Semua field harus diisi!'); window.location='absensi_pengurus.php';</script>";
        exit();
    }

    // Validasi alasan jika memilih "Izin" atau "Sakit"
    if (($keterangan_kehadiran == "Izin" || $keterangan_kehadiran == "Sakit") && empty($alasan)) {
        echo "<script>alert('Harap isi alasan jika memilih Izin atau Sakit!'); window.location='absensi_pengurus.php';</script>";
        exit();
    }

    // Simpan ke database
    $sql = "INSERT INTO absensi_pengurus (nama_lengkap, jenis_kelamin, usia, status, materi1, keterangan_materi1, materi2, keterangan_materi2, keterangan_kehadiran, alasan, acara, tanggal, jam) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssissssssssss", $nama, $jenis_kelamin, $usia, $status, $materi1, $keterangan_materi1, $materi2, $keterangan_materi2, $keterangan_kehadiran, $alasan, $acara, $tanggal, $jam);
        if (!$stmt->execute()) {
            die("Error eksekusi query: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error dalam query: " . $conn->error);
    }

    echo "<script>alert('Absensi berhasil disimpan!'); window.location='index.php';</script>";
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absensi Pengurus</title>
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
    overflow-y: auto; /* Tambahkan scroll jika konten lebih panjang */
}

.absensi-container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-height: 90vh; /* Batas tinggi maksimal */
    overflow-y: auto; /* Biar form bisa di-scroll */
}

        
    </style>
</head>
<body>

<div class="absensi-container text-center bg-white mt-7">
    <h2 class="mb-4">Form Absensi Pengurus</h2>
    <form action="absensi_pengurus.php" method="post" onsubmit="setLocalTime()">
        <div class="mb-2 form-floating">
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
            <label for="nama_lengkap">Nama Lengkap</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label for="jenis_kelamin">Jenis Kelamin</label>
        </div>

        <div class="mb-2 form-floating">
            <input type="number" name="usia" id="usia" class="form-control" placeholder="Usia" required>
            <label for="usia">Usia</label>
        </div>

        <!-- Materi 1 -->
        <div class="mb-2 form-floating">
            <select name="materi1" id="materi1" class="form-select kategori" required>
                <option value="" selected disabled>Pilih Pemateri 1</option>
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

        <div class="mb-3 form-floating" id="keterangan-materi1" style="display: none;">
            <input type="text" name="keterangan_materi1" id="keterangan_materi1" class="form-control" placeholder="Keterangan Materi" readonly>
            <label for="keterangan_materi1">Keterangan Materi 1</label>
        </div>

        <!-- Materi 2 -->
        <div class="mb-2 form-floating">
            <select name="materi2" id="materi2" class="form-select kategori">
                <option value="" selected disabled>Pilih Pemateri 2</option>
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

        <div class="mb-3 form-floating" id="keterangan-materi2" style="display: none;">
            <input type="text" name="keterangan_materi2" id="keterangan_materi2" class="form-control" placeholder="Keterangan Materi" readonly>
            <label for="keterangan_materi2">Keterangan Materi 2</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="status" id="status" class="form-select" required>
                <option value="" selected disabled>Pilih Status</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Sudah Menikah">Sudah Menikah</option>
            </select>
            <label for="status">Status</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="acara" id="acara" class="form-select" required>
                <option value="" selected disabled>Pilih Acara</option>
                <option value="Kelompok">Kelompok</option>
                <option value="Desa">Desa</option>
                <option value="Daerah">Daerah</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <label for="acara">Acara</label>
        </div>

        <div class="mb-2 form-floating">
            <select name="keterangan_kehadiran" id="keterangan_kehadiran" class="form-select" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>
            <label for="keterangan">Keterangan</label>
        </div>
        
        <div class="mb-3 form-floating" id="alasan-container" style="display: none;">
            <input type="text" name="alasan" id="alasan" class="form-control" placeholder="Alasan">
            <label for="alasan">Alasan</label>
        </div>

        <input type="hidden" name="tanggal" id="tanggal">
        <input type="hidden" name="jam" id="jam">

        <button type="submit" class="btn btn-primary w-100">Simpan Absensi</button>
    </form> 
</div>

<script>
    function setLocalTime() {
        let now = new Date();
        document.getElementById('tanggal').value = now.toISOString().split('T')[0];
        document.getElementById('jam').value = now.toTimeString().split(' ')[0];
    }
    document.addEventListener("DOMContentLoaded", function () {
    let keteranganSelect = document.getElementById("keterangan_kehadiran");
    let alasanContainer = document.getElementById("alasan-container");

    keteranganSelect.addEventListener("change", function () {
        if (this.value === "Izin" || this.value === "Sakit") {
            alasanContainer.style.display = "block";
        } else {
            alasanContainer.style.display = "none";
        }
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    function handleMateriChange(selectId, keteranganId, containerId) {
        let selectElement = document.getElementById(selectId);
        let keteranganElement = document.getElementById(keteranganId);
        let containerElement = document.getElementById(containerId);

        selectElement.addEventListener("change", function () {
            let selectedValue = this.value;

            if (selectedValue === "Al-Qur'an" || selectedValue === "Al-Hadist") {
                containerElement.style.display = "block"; // Menampilkan input keterangan
                keteranganElement.value = ""; // Biarkan user mengisi sendiri
                keteranganElement.removeAttribute("readonly"); // Pastikan user bisa mengetik
            } else {
                containerElement.style.display = "none"; // Sembunyikan jika bukan Al-Qur'an atau Al-Hadist
                keteranganElement.value = ""; // Reset nilai
                keteranganElement.setAttribute("readonly", "true"); // Buat readonly agar tidak bisa diisi
            }
        });
    }

    // Panggil fungsi untuk setiap materi
    handleMateriChange("materi1", "keterangan_materi1", "keterangan-materi1");
    handleMateriChange("materi2", "keterangan_materi2", "keterangan-materi2");
});
</script>

</body>
</html>
