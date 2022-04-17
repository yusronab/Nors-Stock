<?php 

include('util/connection.php'); 
$show_data = pg_query($connection, "SELECT * FROM tb_barang ORDER BY id DESC");
$hitung1 = pg_num_rows($show_data);

$ctg = pg_query($connection, "SELECT DISTINCT kategori FROM tb_barang");
$hitung2 = pg_num_rows($ctg);

$updated = pg_query($connection, "SELECT nama, TO_CHAR(updated, 'DD Month YYYY') AS tgl FROM tb_barang WHERE updated >= date_trunc('day', current_timestamp - interval '1 week')");

?>

<!DOCTYPE html>
<html lang="en">

<?php include('util/head.php'); ?>


<body>

    <?php include('util/navbar.php'); ?>

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <h3 class="mb-4">Dashboard</h3>
            <?php if(!empty($_SESSION['message'])){
                echo $_SESSION['message'];
                echo '<meta http-equiv="refresh" content="3;url=index.php">';
                $_SESSION['message'] = null;
            } ?>
        <div class="row">
            <div class="col-md-8 mb-4">
                <form action="pencarian.php" method="POST" class="mb-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <input type="submit" name="submit" value="Cari" class="btn btn-outline-primary">
                        </div>
                        <input type="text" class="form-control" name="kunci" placeholder="Masukan nama / kategori . . ." required autocomplete="off">
                    </div>
                </form>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                      Daftar barang saat ini
                    </div>
                    <?php while($row = pg_fetch_array($show_data)): ?>
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col-7 col-sm-7 col-md-8">
                                    <p><?= $row['nama']; ?></p>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2">
                                    <p class="badge badge-primary text-wrap"><?= $row['stok']; ?></p>
                                </div>
                                <div class="col-3 col-sm-3 col-md-2">
                                    <a href="detail.php?id=<?= $row['id']; ?>">Detail<i class="bi bi-caret-right-fill ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                  </div>
            </div>
            <div class="col-md-4">
                <a href="tambah.php" class="btn btn-secondary w-100 mb-4">Tambah Barang</a>
                <div class="card mb-4">
                    <div class="card-body">
                        <p>Jumlah kategori saat ini</p>
                        <h1 class="text-center"><?php echo $hitung2 ?></h1>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p>Jumlah barang saat ini</p>
                        <h1 class="text-center"><?php echo $hitung1 ?></h1>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Perubahan 1 minggu terakhir
                    </div>
                    <div class="card-body">
                        <?php if(pg_num_rows($updated) == 0): ?>
                            <p class="text-center text-muted">Belum ada data yang diubah</p>
                        <?php else: ?>
                            <?php while($rows = pg_fetch_array($updated)): ?>
                                <p class="text-muted">Tanggal: <span><?= $rows['tgl'] ?></span></p>
                                <p>Perubahan pada <span class="text-primary"><?= strtolower($rows['nama']); ?></span></p>
                                <?php if(pg_num_rows($updated) > 1): ?>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('util/js.php'); ?>
    
</body>

</html>
