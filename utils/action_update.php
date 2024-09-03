<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idPasien'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $noTelepon = $_POST['noTelepon'];

    $sql = "UPDATE pasien SET 
            nama = ?, 
            alamat = ?, 
            tanggalLahir = ?, 
            jenisKelamin = ?, 
            noTelepon = ? 
            WHERE idPasien = ?";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssssi", $nama, $alamat, $tanggalLahir, $jenisKelamin, $noTelepon, $id);
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
