<?php
include "config.php"; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $usia = $_POST['usia'] ?? 0;
    $status = $_POST['status'] ?? '';
    $acara = $_POST['acara'] ?? '';
    
    // Tambahan materi
    $materi1 = $_POST['materi1'] ?? '';
    $keterangan_materi1 = $_POST['keterangan_materi1'] ?? '';
    $materi2 = $_POST['materi2'] ?? '';
    $keterangan_materi2 = $_POST['keterangan_materi2'] ?? '';

    $keterangan_kehadiran = $_POST['keterangan_kehadiran'] ?? ''; // Sesuai dengan struktur database
    $tanggal = $_POST['tanggal'] ?? '';
    $jam = $_POST['jam'] ?? '';

    // Logika untuk alasan
    if ($keterangan_kehadiran == 'Hadir') {
        $alasan = null; // Kosongkan alasan jika "Hadir"
    } elseif ($keterangan_kehadiran == 'Sakit' || $keterangan_kehadiran == 'Izin') {
        if (empty($_POST['alasan'])) {
            echo "<script>alert('Silakan isi alasan untuk keterangan Sakit/Izin.'); window.history.back();</script>";
            exit;
        }
        $alasan = $_POST['alasan'];
    } else {
        $alasan = null;
    }

    // Pastikan ID tidak kosong sebelum update
    if ($id) {
        // Query update
        $query = "UPDATE absensi_pengurus SET 
                    nama_lengkap=?, 
                    jenis_kelamin=?, 
                    usia=?, 
                    status=?, 
                    acara=?, 
                    materi1=?, 
                    keterangan_materi1=?, 
                    materi2=?, 
                    keterangan_materi2=?, 
                    keterangan_kehadiran=?, 
                    alasan=?, 
                    tanggal=?, 
                    jam=? 
                  WHERE id=?";

        // Siapkan statement
        $stmt = $conn->prepare($query);

        // Cek apakah prepare() berhasil
        if (!$stmt) {
            die("Query error: " . $conn->error); // Debugging jika prepare() gagal
        }

        // Bind parameter
        $stmt->bind_param("ssissssssssssi", 
            $nama_lengkap, 
            $jenis_kelamin, 
            $usia, 
            $status, 
            $acara, 
            $materi1, 
            $keterangan_materi1, 
            $materi2, 
            $keterangan_materi2, 
            $keterangan_kehadiran, 
            $alasan, 
            $tanggal, 
            $jam, 
            $id
        );

        // Eksekusi statement
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location='halamanadmin.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data!'); window.history.back();</script>";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "<script>alert('ID tidak ditemukan!'); window.history.back();</script>";
    }
}

// Tutup koneksi
$conn->close();
?>
