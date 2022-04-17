<?php

include('util/connection.php');
if (isset($_POST['submit'])) {
    $kunci = $_POST['kunci'];
    $query = pg_query("SELECT * FROM tb_barang WHERE nama LIKE upper('%$kunci%') AND kategori LIKE upper('%$kunci%')");
    $hitung = pg_num_rows($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('util/head.php'); ?>

<body>

    <?php include('util/navbar.php'); ?>

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <h3 class="mb-4">Hasil Pencarian</h3>
        <p class="text-muted"><?php echo $hitung ?> Hasil ditemukan</p>
        <div class="row">
            <?php while($row = pg_fetch_array($query)): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama'] ?></h5>
                            <p class="text-muted">Stok :<span class="badge badge-primary text-wrap ml-2"><?= $row['stok']; ?></span></p>
                            <p class="card-text">Kategori <?= strtolower($row['kategori']) ?></p>
                            <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-primary">Detail<i class="bi bi-caret-right-fill ml-1"></i></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include('util/js.php'); ?>
    
</body>
</html>