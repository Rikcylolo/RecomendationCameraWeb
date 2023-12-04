<?php 
    require 'functions.php';

    if (isset ($_POST["submit"])) {
        if (insert($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = 'index.php';
                </script>"
                ;
        } else {
            echo "
                <script>
                    alert('data gagal ditambah!');
                    document.location.href = 'index.php';
                </script>"
                ; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data Kamera</title>
</head>
<body>
    <table cellpadding= "10px"; cellspacing= "15px">
        <tr>
            <th><a href="index.php">Katalog Kamera</a></th>
            <th><a href="recomendation.php">Rekomendasi</a></th>
            <th><a href="insert.php">Masukkan Data kamera</a></th>
        </tr>
    </table>
    <h1>Insert data kamera</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="namaProduk">Nama Produk : </label>
                <input type="text" name="namaProduk" id="namaProduk">
            </li>
            <br>
            <li>
                <label for="merek">Merek : </label>
                <input type="text" name="merek" id="merek">
            </li>
            <br>
            <li>
                <label for="resGbr">Resolusi Gambar : </label>
                <input type="text" name="resGbr" id="resGbr">
            </li>
            <br>
            <li>
                <label for="resVid">Resolusi Video : </label>
                <input type="text" name="resVid" id="resVid">
            </li>
            <br>
            <li>
                <label for="maxISO">ISO Maksimal : </label>
                <input type="text" name="maxISO" id="maxISO">
            </li>
            <br>
            <li>
                <label for="baterai">Kapasitas Baterai : </label>
                <input type="text" name="baterai" id="baterai">
            </li>
            <br>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <br>
            <li>
                <label for="berat">Berat : </label>
                <input type="text" name="berat" id="berat">
            </li>
            <br>
            <li>
                <label for="harga">Harga Produk : </label>
                <input type="text" name="harga" id="harga">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Simpan</button>
            </li>
        </ul>
    </form>
</body>
</html>