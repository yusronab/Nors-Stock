<?php

include('../util/connection.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $ktg = $_POST['ktg'];
    $stok = $_POST['stok'];
    $sql = "UPDATE tb_barang SET nama='$nama', kategori='$ktg', stok='$stok', updated=CURRENT_TIMESTAMP WHERE id='$id'";
    $result = pg_affected_rows(pg_query($sql));
    if($result == 1) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Berhasil Mengubah Data</div>';
        header("location:../index.php");
    }
    else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Mengubah Data</div>';
        header("location:../ubah.php?id=$id");
    }
}

?>