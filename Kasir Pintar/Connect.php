<?php

    $DB_NAMA = "kasir";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_HOST = "127.0.0.1";

    $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAMA);

    if (mysqli_errno($conn)) {
        echo "Gagal terhubung ke database" . mysqli_error($conn);
    }

?>