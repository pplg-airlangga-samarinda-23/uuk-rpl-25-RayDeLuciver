<?php
session_start();
include('db.php');
include('functions.php');

// dari id sampai exit adalah proses php buat cek apakah sudah login sebagai admin kalo sudah login
// jika sudah login menjadi admin bakal di pindah ke halaman admin.php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];  
    $sql = "SELECT * FROM bayi WHERE id = $id";
    $result = $conn->query($sql);
    $bayi = $result->fetch_assoc();

    if (!$bayi) {
        echo "Data bayi tidak ditemukan!";
        exit;
    }

    if (isset($_POST['edit'])) {
        $nama_anak = $_POST['nama_anak'];
        $tinggi_badan = $_POST['tinggi_badan'];
        $berat_badan = $_POST['berat_badan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $tempat_tinggal = $_POST['tempat_tinggal'];

        $sql_update = "UPDATE bayi SET nama_anak = '$nama_anak', tinggi_badan = $tinggi_badan, berat_badan = $berat_badan, tanggal_lahir = '$tanggal_lahir', tempat_tinggal = '$tempat_tinggal' WHERE id = $id";

        if ($conn->query($sql_update) === TRUE) {
            echo "Data bayi berhasil diupdate.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Bayi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Bayi</h2>
    <form method="post" action="">
        <input type="text" name="nama_anak" value="<?php echo $bayi['nama_anak']; ?>" required>
        <input type="number" name="tinggi_badan" value="<?php echo $bayi['tinggi_badan']; ?>" required>
        <input type="number" name="berat_badan" value="<?php echo $bayi['berat_badan']; ?>" required>
        <input type="date" name="tanggal_lahir" value="<?php echo $bayi['tanggal_lahir']; ?>" required>
        <input type="text" name="tempat_tinggal" value="<?php echo $bayi['tempat_tinggal']; ?>" required>
        <button type="submit" name="edit">Simpan Perubahan</button>
    </form>
</body>
</html>
