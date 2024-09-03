<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $noTelepon = $_POST['noTelepon'];

    $sql = "INSERT INTO pasien (nama, alamat, tanggalLahir, jenisKelamin, noTelepon) VALUES (?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssss", $nama, $alamat, $tanggalLahir, $jenisKelamin, $noTelepon);
    if ($stmt->execute()) {
        header("Location: ../");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$connection->close();
?>
