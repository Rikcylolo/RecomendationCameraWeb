<?php 
    //Koneksi ke database.
    $conn = mysqli_connect("localhost", "root", "", "rekomendasikamera");


    function query($query) {
        global $conn;
        $result = mysqli_query ($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function insert($data) {
        global $conn;

        $namaProduk = htmlspecialchars($data["namaProduk"]);
        $merek = htmlspecialchars($data["merek"]);
        $resGbr = htmlspecialchars($data["resGbr"]);
        $resVid = htmlspecialchars($data["resVid"]);
        $maxISO = htmlspecialchars($data["maxISO"]);
        $baterai = htmlspecialchars($data["baterai"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $berat = htmlspecialchars($data["berat"]);
        $harga = htmlspecialchars($data["harga"]);

        $query = "INSERT INTO cameras (
            namaProduk, 
            merek, 
            resGbr, 
            resVid,
            maxISO, 
            baterai, 
            gambar, 
            berat, 
            harga) VALUES 
            ('$namaProduk', 
            '$merek', 
            '$resGbr', 
            '$resVid', 
            '$maxISO', 
            '$baterai', 
            '$gambar', 
            '$berat', 
            '$harga')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function update($id, $data) {
        global $conn;
        $namaProduk = htmlspecialchars($data["namaProduk"]);
        $merek = htmlspecialchars($data["merek"]);
        $resGbr = htmlspecialchars($data["resGbr"]);
        $resVid = htmlspecialchars($data["resVid"]);
        $maxISO = htmlspecialchars($data["maxISO"]);
        $baterai = htmlspecialchars($data["baterai"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $berat = htmlspecialchars($data["berat"]);
        $harga = htmlspecialchars($data["harga"]);

        $query = "UPDATE cameras SET
            namaProduk = '$namaProduk',
            merek = '$merek',
            resGbr = '$resGbr',
            resVid = '$resVid',
            maxISO = '$maxISO',
            baterai = '$baterai',
            gambar = '$gambar',
            berat = '$berat',
            harga = '$harga' 
            WHERE cameraID = $id;
            ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM cameras WHERE cameraID = $id");
        return mysqli_affected_rows($conn);
    }
?>