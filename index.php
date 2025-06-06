
<?php
session_start();
include('db.php');
include('functions.php');

$dataBayi = ambilDataBayi();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bayi Posyandu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Bayi Posyandu</h2>
    <table>
        <tr>
            <th>Nama Anak</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Tinggal</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $dataBayi->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['nama_anak']; ?></td>
                <td><?php echo $row['tinggi_badan']; ?></td>
                <td><?php echo $row['berat_badan']; ?></td>
                <td><?php echo $row['tanggal_lahir']; ?></td>
                <td><?php echo $row['tempat_tinggal']; ?></td>
                <td><a href="edit_bayi.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
