<?php

include('../util/connection.php');

$sql = "DELETE FROM tb_barang WHERE id='".$_GET['id'] ."'";
$result = pg_affected_rows(pg_query($sql));
if ($result == 1) {
    $_SESSION['message'] = '<div class="alert alert-success" role="alert">Berhasil Menghapus Data</div>';
    header("location:../index.php");
}
else {
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menghapus Data</div>';
    header("location:../index.php");  
}

?>