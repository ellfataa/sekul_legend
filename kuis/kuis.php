<?php
    include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>	
        <title>Kuis Sederhana</title>	
    </head>	
    <body>
        <form action="hasil_kuis.php" method="POST">	
        <?php
            $select = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_soal='$_GET[id_soal]' ORDER BY RAND()");
            $sql = mysqli_num_rows($select);
            echo "<ol>";
            while ($row = mysqli_fetch_array($select)) {
                echo "<li>" . $row['deskripsi'] . "</li>";
                $id_pertanyaan = $row['id_pertanyaan'];
                $select2 = mysqli_query($conn, "SELECT * FROM jawaban WHERE id_pertanyaan='$id_pertanyaan' ORDER BY RAND()");
                while ($row2 = mysqli_fetch_array($select2)) {
                    echo "<input type='radio' name='jawaban[" . $row['id_pertanyaan'] . "]' value='" . $row2['id_jawaban'] . "'> " . $row2['deskripsi'] . "<br>";
                }
            }
            echo "</ol>";
        ?>
        <br/>
        <button type="submit">Kirim Jawaban</button>
        </form>
    </body>
</html>