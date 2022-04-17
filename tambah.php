<?php 

include('util/connection.php'); 

?>

<!DOCTYPE html>
<html>

    <?php include('util/head.php'); ?>

    <body>
        <?php include('util/navbar.php'); ?>

        <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
            <div class="pt-5">
                <h3 class="text-center"><b>Tambah Barang</b></h3>
                <?php if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                } ?>
            </div>
            <div class="card mt-5">
                <form action="process/tambah_proses.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama..." required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori..." required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukan Stok..." required>
                        </div>
                    <div class="mt-5 text-right">
                        <button class="btn btn-secondary mr-3" type="button" onclick="history.back()">Batal</button>
                        <input type="submit" name="submit" value="Simpan" onclick="return confirm('Apakah anda yakin?')" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <?php include('util/js.php'); ?>

    </body>
</html>