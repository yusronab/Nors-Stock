<?php

include('util/connection.php');

$query = pg_query($connection, "SELECT * FROM tb_barang WHERE id=".$_GET['id']);
while($row = pg_fetch_array($query)){
    $id = $row['id'];
    $nama = $row['nama'];
    $ktg = $row['kategori'];
    $stok = $row['stok'];
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('util/head.php') ?>

<body>
    
    <?php include('util/navbar.php') ?>

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <h3 class="mb-4">Ubah Detail Barang</h3>
        <?php if(!empty($_SESSION['message'])){
            echo $_SESSION['message'];
            echo '<meta http-equiv="refresh" content="3;url=ubah.php">';
            $_SESSION['message'] = null;
        } ?>
        <div class="card mt-5">
            <form action="process/ubah_proses.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ktg">Kategori</label>
                        <input type="text" class="form-control" id="ktg" name="ktg" value="<?php echo $ktg; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control mb-5" id="stok" name="stok" value="<?php echo $stok; ?>" required>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-secondary mr-3" type="button" onclick="history.back()">Batal</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('Apakah Anda Yakin?')">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include('util/js.php') ?>

</body>
</html>