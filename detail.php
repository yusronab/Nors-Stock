<?php

include('util/connection.php');
$query = pg_query($connection, "SELECT * FROM tb_barang WHERE id=".$_GET['id']);
while($row = pg_fetch_array($query)){
    $id = $row['id'];
    $nama = $row['nama'];
    $ktg = $row['kategori'];
    $stok = $row['stok'];
}

$sorter = pg_query($connection, "SELECT * FROM tb_barang WHERE kategori='$ktg' AND id != $id");

?>

<!DOCTYPE html>
<html lang="en">

<?php include('util/head.php'); ?>

<body>
    
    <?php include('util/navbar.php'); ?>

    <div class="container" style="margin-top: 100px;">
        <h3 class="mb-4">Detail Barang</h3>
        <div class="row">
            <div class="col-md-7 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nama ?></h5>
                        <p class="text-muted">Stok :<span class="badge badge-primary text-wrap ml-2"><?php echo $stok; ?></span></p>
                        <p class="card-text">Kategori <?php echo strtolower($ktg); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="ubah.php?id=<?php echo $id; ?>" class="btn btn-primary mr-3">Ubah</a>
                        <a href="process/hapus_proses.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h5 class="text-primary mb-3">Barang dengan kategori yang sama</h5>
                <?php while($row = pg_fetch_array($sorter)): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama'] ?></h5>
                            <p class="text-muted">Stok :<span class="badge badge-primary text-wrap ml-2"><?= $row['stok']; ?></span></p>
                            <p class="card-text">Kategori <?= strtolower($row['kategori']) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php include('util/js.php'); ?>

</body>
</html>