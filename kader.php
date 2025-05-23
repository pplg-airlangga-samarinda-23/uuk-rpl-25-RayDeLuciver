<?php
session_start();
include('db.php');
include('functions.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'kader') {
    header('Location: login.php');
    exit;
}

if (isset($_POST['tambah'])) {
    $nama_anak = $_POST['nama_anak'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_tinggal = $_POST['tempat_tinggal'];
    
    if (tambahBayi($nama_anak, $tinggi_badan, $berat_badan, $tanggal_lahir, $tempat_tinggal)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kader Posyandu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Bayi</h2>
    <form method="post" action="">
        <input type="text" name="nama_anak" placeholder="Nama Anak" required>
        <input type="number" name="tinggi_badan" placeholder="Tinggi Badan" required>
        <input type="number" name="berat_badan" placeholder="Berat Badan" required>
        <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
        <input type="text" name="tempat_tinggal" placeholder="Tempat Tinggal" required>
        <button type="submit" name="tambah">Tambah Data</button>
    </form>
</body>
</html>
