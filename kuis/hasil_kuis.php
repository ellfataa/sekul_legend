<?php
    include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hasil Kuis</title>
    </head>
    <body>
    <?php
    if (empty($_POST['jawaban']) === true) {
        echo '<p>Anda belum menjawab pertanyaan</p>';
        exit();
    }else{
        $totalSkor = 0;
        echo '<h1>Hasil Kuis</h1>';
        foreach ($_POST['jawaban'] as $idPertanyaan => $idJawaban) {
            $select = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_pertanyaan='$idPertanyaan'");
            $row = mysqli_fetch_array($select);
            echo "<ul>";
            echo "<li>" . $row['deskripsi'] . "</li>";
            $select2 = mysqli_query($conn, "SELECT * FROM jawaban WHERE id_jawaban='$idJawaban'");
            $row2 = mysqli_fetch_array($select2);
            echo "<p>Jawaban Anda: " . $row2['deskripsi'] . "</p>";
            if ($row2['benar'] == 1) {
                echo "<p style='color:green'>Benar</p>";
                $totalSkor += $row['skor'];
            } else {
                echo "<p style='color:red'>Salah</p>";
            }
            echo "</ul>";
        }
        $totalSkor = $totalSkor*20;
        echo '<h1>Selamat Skor Anda: '.$totalSkor.'</h1>';
    }
        
    ?>
    </body>
</html>