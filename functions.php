
<?php
function login($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function tambahBayi($nama_anak, $tinggi_badan, $berat_badan, $tanggal_lahir, $tempat_tinggal) {
    global $conn;
    $sql = "INSERT INTO bayi (nama_anak, tinggi_badan, berat_badan, tanggal_lahir, tempat_tinggal) VALUES ('$nama_anak', $tinggi_badan, $berat_badan, '$tanggal_lahir', '$tempat_tinggal')";
    return $conn->query($sql);
}

function editBayi($id, $nama_anak, $tinggi_badan, $berat_badan, $tanggal_lahir, $tempat_tinggal) {
    global $conn;
    $sql = "UPDATE bayi SET nama_anak = '$nama_anak', tinggi_badan = $tinggi_badan, berat_badan = $berat_badan, tanggal_lahir = '$tanggal_lahir', tempat_tinggal = '$tempat_tinggal' WHERE id = $id";
    return $conn->query($sql);
}

function ambilDataBayi() {
    global $conn;
    $sql = "SELECT * FROM bayi";
    return $conn->query($sql);
}
?>
