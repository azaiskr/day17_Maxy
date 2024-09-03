<?php

include 'connection.php';

if (isset($_GET['id'])) {
    $idPasien = $_GET['id'];
    $sql = "DELETE FROM pasien WHERE idPasien = ?";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $idPasien);
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
