<?php 
    session_start();
    require 'functions.php';
    $hasil = $_SESSION['hasil'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 150px;
            margin: 10px;
        }
    </style>
</head>
<body>
<table border= "1px"; cellpadding= "10px"; cellspacing= "0px"; float="right">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Hasil</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($hasil as $camera): ?>
            <?php if ($i <= 6): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="<?= $camera["gambar"];?>" alt=""></td>
                    <td><?= $camera["namaProduk"]; ?></td>
                    <td><?= $camera["hasil"]; ?></td>
                    <td>
                        <form action="detail.php" method="post">
                            <button type="submit" name="submit" value="<?= $camera["cameraID"]?>">
                                Pilih
                            </button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>