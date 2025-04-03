<?php
include "config.php"; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $usia = $_POST['usia'];
    $status = $_POST['status'];
    $acara = $_POST['acara'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    // Logika untuk alasan
    if ($keterangan == 'Hadir') {
        $alasan = null; // Kosongkan alasan jika keterangan "Hadir"
    } elseif ($keterangan == 'Sakit' || $keterangan == 'Izin') {
        if (empty($_POST['alasan'])) {
            echo "<script>alert('Silakan isi alasan untuk keterangan Sakit/Izin.'); window.history.back();</script>";
            exit;
        }
        $alasan = $_POST['alasan'];
    } else {
        $alasan = null;
    }

    // Query update
    $query = "UPDATE remaja SET 
                nama_lengkap=?, 
                jenis_kelamin=?, 
                usia=?, 
                status=?, 
                acara=?, 
                keterangan=?, 
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
    $stmt->bind_param("ssissssssi", 
        $nama_lengkap, 
        $jenis_kelamin, 
        $usia, 
        $status, 
        $acara, 
        $keterangan, 
        $alasan, 
        $tanggal, 
        $jam, 
        $id
    );

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='index.php';</script>";
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();

?>
