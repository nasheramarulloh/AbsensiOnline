<?php
session_start();
include "config.php"; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hardcoded admin credentials
    $correctUsername = "khoirunnajah354";
    $correctPassword = "35431312113";

    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION["admin"] = $username;
        header("Location: halamanadmin.php"); // Redirect ke halaman admin
        exit();
    } else {
        echo "<script>alert('Username atau password salah!'); window.location.href = 'loginadmin.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PPG Digital Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
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

    <div class="login-container text-center">
        <h2 class="mb-4">Login Admin</h2>
        <form action="loginadmin.php" method="post">
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Username :</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Masuk</button>
            <hr>
            <a href="login.php">Masuk sebagai user</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
