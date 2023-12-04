<?php 
    require 'functions.php';
    $cameras = query("SELECT * FROM cameras");
    // print_r ($cameras);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Kamera</title>
    <style>
        img{
            width: 150px;
            margin: 10px;
        }
    </style>
    
</head>
<body>
    <table cellpadding= "10px"; cellspacing= "15px">
        <tr>
            <th><a href="index.php">Katalog Kamera</a></th>
            <th><a href="recomendation.php">Rekomendasi</a></th>
            <th><a href="insert.php">Masukkan Data kamera</a></th>
        </tr>
    </table>
    <h1>Daftar Kamera</h1>
    <table border= "1px"; cellpadding= "10px"; cellspacing= "0px"; float="right">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($cameras as $camera): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="<?= $camera["gambar"];?>" alt=""></td>
                <td><?= $camera["namaProduk"]; ?></td>
                <td><?= $camera["harga"]; ?></td>
                <td>
                    <form action="detail.php" method="post">
                        <button type="submit" name="submit" value="<?= $camera["cameraID"]?>">
                            Pilih
                        </button>
                    </form>
                    <a href="update.php?cameraID=<?= $camera["cameraID"];?>">
                            <button type="submit" name="submit" >
                                Update
                            </button>
                        </a>
                        <br>
                    <a href="delete.php?cameraID=<?= $camera["cameraID"];?>"onclick="return confirm('Yakin hapus?');">
                        <button type="submit" name="submit" >
                            Delete
                        </button>
                    </a>
                </td>

                <?php $i++; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>