<?php
    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //UPLOAD MATERI
    include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis</title>
    <!--<link rel="stylesheet" href="quiz.css" type="text/css">-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <div class="sidebar">
                <div class="toggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <p class="namalogo">Sekul Legend</p>

            </div><br>
            <div>
                <li><a class="dash1" href="../index.php"><img src="../gambar/home.svg" alt="Home">Home</a></li><br>
                <li><a  class="dash2" href="../user/kelas.php"><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href="https://calendar.google.com/"><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </nav>

    <div class="soalKuis">
    <h1>Kuis</h1>
    <?php
if(isset($_POST['submit'])){
    $judul_soal = $_POST['judul_soal'];
    
    // Insert judul soal
    $insert_soal = mysqli_query($conn, "INSERT INTO soal (id_soal, judul_soal) VALUES ('', '$judul_soal')");
    
    if ($insert_soal) {
        $id_soal = mysqli_insert_id($conn); // Mendapatkan ID terakhir yang dimasukkan

        // Loop untuk pertanyaan
        for ($i = 1; $i <= 5; $i++) {
            $pertanyaan = $_POST['pertanyaan'.$i];
            $skor = $_POST['skor'.$i];

            // Insert pertanyaan
            $insert_pertanyaan = mysqli_query($conn, "INSERT INTO pertanyaan (id_pertanyaan, id_soal, deskripsi, skor) VALUES ('', '$id_soal', '$pertanyaan', '$skor')");
            
            if ($insert_pertanyaan) {
                $id_pertanyaan = mysqli_insert_id($conn); // Mendapatkan ID pertanyaan terakhir yang dimasukkan

                // Loop untuk jawaban
                for ($j = 1; $j <= 4; $j++) {
                    $jawaban = $_POST['jawaban'.$i.$j];
                    $benar = $_POST['benar'.$j];

                    // Insert jawaban
                    $insert_jawaban = mysqli_query($conn, "INSERT INTO jawaban (id_jawaban, id_pertanyaan, deskripsi, benar) VALUES ('', '$id_pertanyaan', '$jawaban', '$benar')");

                    // Handle errors for $insert_jawaban if needed
                }
            } else {
                // Handle errors for $insert_pertanyaan if needed
            }
        }
    } else {
        // Handle errors for $insert_soal if needed
    }
}
?>

        <form action="" method="post">
            <label for="judul_soal">Judul Soal/Kuis</label><br>
            <input type="text" name="judul_soal" id="judul_soal"><br><br>
            <?php
            for($i=1;$i<=5;$i++){
                echo "<hr>";
                echo "<h3>Pertanyaan ".$i."</h3>";
                echo "<label for='pertanyaan".$i."'>Pertanyaan ".$i."</label><br>";
                echo "<input type='text' name='pertanyaan".$i."' id='pertanyaan".$i."'><br>";
                echo "<label for='skor".$i."'>Skor ".$i."</label><br>";
                echo "<input type='text' name='skor".$i."' id='skor".$i."'><br>";
                $j=1;
                while($j<=4){
                    echo "<label for='jawaban".$j."'>Jawaban ".$j."</label><br>";
                    echo "<input type='text' name='jawaban".$i.$j."' id='jawaban".$j."'><br>";
                    echo "<label for='benar".$j."'>Benar ".$j."</label><br>";
                    echo "<input type='number' name='benar".$j."' id='benar".$j."'><br><br>";
                    $j++;
                }
            }
            ?>
            <input type="submit" name="submit" value="Kirim Jawaban">
        </form>
    </div>

    <script>
        const toggle = document.querySelector('.toggle input');
        const nav = document.querySelector('nav ul');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>
</html>