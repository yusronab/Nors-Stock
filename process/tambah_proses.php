<?php

include('../util/connection.php');

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $ktg = $_POST['kategori'];
    $stok = $_POST['stok'];
    $statement = pg_query($connection, "INSERT INTO tb_barang(nama, kategori, stok, created) VALUES(UPPER('$nama'), UPPER('$ktg'), '$stok', CURRENT_TIMESTAMP)");
    if ($statement) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>';
        header("location:../index.php");
    }
    else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
        header("location:../index.php");       
    }
}

?>