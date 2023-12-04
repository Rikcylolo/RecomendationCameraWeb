<?php 
    require 'functions.php';
    $id = $_POST["submit"];
    $cameras = query("SELECT * FROM cameras WHERE cameraID = '$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamera</title>
    <style>
        ul {
            list-style-type: none;
        }

        img {
            width: 400px;
            margin: 30px;
            transition: 0.8s;
        }

        img:hover {
            scale: 110%;
        }
    </style>
    
</head>
<body>
    <table cellpadding= "10px"; cellspacing= "15px">
        <tr>
            <th><a href="index.php">Katalog Kamera</a></th>
            <th><a href="recomendation.php">Rekomendasi</a></th>
        </tr>
    </table>

    <h1>Detail Kamera</h1>
    <?php foreach ($cameras as $camera): ?>
        <h2><?= $camera["namaProduk"] ?></h2>
        <ul>
            <li><img src="<?= $camera["gambar"]?>" alt=""></li>
            <li>Harga : <?= $camera["harga"]; ?></li>
            <li>Merek : <?= $camera["merek"]; ?></li>
            <li>Resolusi Gambar : <?= $camera["resGbr"]; ?></li>
            <li>Resolusi Video : <?= $camera["resVid"]; ?></li>
            <li>ISO Maksimal : <?= $camera["maxISO"]; ?></li>
            <li>Baterai : <?= $camera["baterai"]; ?></li>
            <li>Berat : <?= $camera["berat"]; ?></li>
        </ul>
    <?php endforeach; ?>


    <a href="index.php">kembali</a>
</body>
</html>