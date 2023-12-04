<?php
session_start();
require 'functions.php';
$hasil = $_SESSION['hasil'];

$filterValue = isset($_GET['filter']) ? $_GET['filter'] : count($hasil);
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
    <form action="" method="get">
        <select id="filter" class="filter" name="filter" onchange="this.form.submit()">
            <option value="6" <?= ($filterValue == 6) ? 'selected' : ''; ?>>6</option>
            <option value="<?= count($hasil);?>" <?= ($filterValue == count($hasil)) ? 'selected' : ''; ?>>All</option>
        </select>
    </form>

    <table border="1px" cellpadding="10px" cellspacing="0px" float="left">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Hasil</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($hasil as $camera): ?>
            <?php if ($i <= $filterValue): ?>
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
