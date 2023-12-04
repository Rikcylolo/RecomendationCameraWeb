<?php 
    require 'functions.php';
?>

<?php 
    

    // print_r ($normalisasi[0]);
    // echo $normalisasi[0];
    
if(isset($_POST['submit'])) {
    if($_POST["merek"] == "CANON") {
        $cameras = query("SELECT * FROM cameras WHERE merek = 'CANON'");
    } elseif ($_POST["merek"] == "NIKON") {
        $cameras = query("SELECT * FROM cameras WHERE merek = 'NIKON'");
    } elseif ($_POST["merek"] == "SONY") {
        $cameras = query("SELECT * FROM cameras WHERE merek = 'SONY'");
    } else {
        $cameras = query("SELECT * FROM cameras");
    }
    

    session_start();
    $gbr = [];
    $vid = [];
    $iSO = [];
    $bat = [];
    $ber = [];
    $hrg = [];

    foreach ($cameras as $camera) {
        $gbr [] = $camera["resGbr"];
        $vid [] = $camera["resVid"];
        $iSO [] = $camera["maxISO"];
        $bat [] = $camera["baterai"];
        $ber [] = $camera["berat"];
        $hrg [] = $camera["harga"];
    }


    $i = 0;
    $normalisasi = [];
    foreach ($cameras as $camera) {
        $normalisasi[$i] = [
            "cameraID" => $camera["cameraID"],
            
            "gambar" => $camera["gambar"],
            "namaProduk" => $camera["namaProduk"],
            "resGbr" => $camera["resGbr"] / max($gbr),
            "resVid" => $camera["resVid"] / max($vid),
            "maxISO" => $camera["maxISO"] / max($iSO),
            "baterai" => $camera["baterai"] / max($bat),
            "berat" => min($ber) / $camera["berat"],
            "harga" => min($hrg) / $camera["harga"]
        ];
        $i++;
    }

        $bobot1 = isset($_POST['bobot1']) ? $_POST['bobot1'] : null;
        $bobot2 = isset($_POST['bobot2']) ? $_POST['bobot2'] : null;
        $bobot3 = isset($_POST['bobot3']) ? $_POST['bobot3'] : null;
        $bobot4 = isset($_POST['bobot4']) ? $_POST['bobot4'] : null;
        $bobot5 = isset($_POST['bobot5']) ? $_POST['bobot5'] : null;
        $bobot6 = isset($_POST['bobot6']) ? $_POST['bobot6'] : null;

        $totalBobot = $bobot1+ $bobot2+ $bobot3+ $bobot4+ $bobot5+ $bobot6;

        $hasil = [];
        for ($i=0; $i<count($normalisasi); $i++) {
            $hasil[$i] = [
                "cameraID" => $normalisasi[$i]["cameraID"],
                "hasil" => sprintf("%.3f", 
                        (0.5*(
                            $normalisasi[$i]["resGbr"]*($bobot1/$totalBobot)+ 
                            $normalisasi[$i]["resVid"]*($bobot2/$totalBobot)+ 
                            $normalisasi[$i]["maxISO"]*($bobot3/$totalBobot)+ 
                            $normalisasi[$i]["baterai"]*($bobot4/$totalBobot)+ 
                            $normalisasi[$i]["berat"]*($bobot5/$totalBobot)+ 
                            $normalisasi[$i]["harga"]*($bobot6/$totalBobot)))+
                        (0.5*(
                            pow($normalisasi[$i]["resGbr"], ($bobot1/$totalBobot))+ 
                            pow($normalisasi[$i]["resVid"], ($bobot2/$totalBobot))+ 
                            pow($normalisasi[$i]["maxISO"], ($bobot3/$totalBobot))+ 
                            pow($normalisasi[$i]["baterai"], ($bobot4/$totalBobot))+ 
                            pow($normalisasi[$i]["berat"], ($bobot5/$totalBobot))+ 
                            pow($normalisasi[$i]["harga"], ($bobot6/$totalBobot))
                            )
                        )
                    ),
                "gambar" => $normalisasi[$i]["gambar"],
                "namaProduk" => $normalisasi[$i]["namaProduk"]
            ];
        }

        usort($hasil, function($a, $b) {
            return $b['hasil'] <=> $a['hasil'];
        });

        $_SESSION['hasil'] = $hasil;
        header("Location: result.php");
            exit;
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Kamera</title>
</head>
<body>
    <table cellpadding= "10px"; cellspacing= "15px">
        <tr>
            <th><a href="index.php">Katalog Kamera</a></th>
            <th><a href="recomendation.php">Rekomendasi</a></th>
        </tr>
    </table>
    <h1>Rekomendasi Kamera</h1>

    

    <form action="" method="post">
        <label for="merek" name="merek">Merek : </label>
        
        <select id="merek" class="merek" name="merek">
            <option value="all">Semua Merek</option>
            <option value="CANON">CANON</option>
            <option value="NIKON">NIKON</option>
            <option value="SONY">SONY</option>
        </select>
        <br><br>

        Resolusi Foto :
        <br>
        Sangat Tidak Penting
        <input type="radio" name="bobot1" value="1">1
        <input type="radio" name="bobot1" value="2">2
        <input type="radio" name="bobot1" value="3">3
        <input type="radio" name="bobot1" value="4">4
        <input type="radio" name="bobot1" value="5">5
        Sangat Penting
        <br><br>

        Resolusi Video :
        <br>
        Sangat Tidak Penting
        <input type="radio" name="bobot2" value="1">1
        <input type="radio" name="bobot2" value="2">2
        <input type="radio" name="bobot2" value="3">3
        <input type="radio" name="bobot2" value="4">4
        <input type="radio" name="bobot2" value="5">5
        Sangat Penting
        <br><br>

        ISO :
        <br>
        Sangat Tidak Penting
        <input type="radio" name="bobot3" value="1">1
        <input type="radio" name="bobot3" value="2">2
        <input type="radio" name="bobot3" value="3">3
        <input type="radio" name="bobot3" value="4">4
        <input type="radio" name="bobot3" value="5">5
        Sangat Penting
        <br><br>

        Baterai :
        <br>
        Sangat Tidak Penting
        <input type="radio" name="bobot4" value="1">1
        <input type="radio" name="bobot4" value="2">2
        <input type="radio" name="bobot4" value="3">3
        <input type="radio" name="bobot4" value="4">4
        <input type="radio" name="bobot4" value="5">5
        Sangat Penting
        <br><br>

        Berat :
        <br>
        Sangat Ringan
        <input type="radio" name="bobot5" value="5">1
        <input type="radio" name="bobot5" value="4">2
        <input type="radio" name="bobot5" value="3">3
        <input type="radio" name="bobot5" value="2">4
        <input type="radio" name="bobot5" value="1">5
        Sangat Berat
        <br><br>

        Harga :
        <br>
        Sangat Murah
        <input type="radio" name="bobot6" value="5">1
        <input type="radio" name="bobot6" value="4">2
        <input type="radio" name="bobot6" value="3">3
        <input type="radio" name="bobot6" value="2">4
        <input type="radio" name="bobot6" value="1">5
        Sangat Mahal
        <br><br>
        <button class="submit" name="submit">Kirim!</button>
    </form>



    
</body>
</html>