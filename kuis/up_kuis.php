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
    <link rel="stylesheet" href="quiz.css" type="text/css">

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
        <form action="hasil_kuis.php" method="post">
            <?php
                try{
                    $sql = mysqli_query($conn, "SELECT * FROM soal_kuis ORDER BY rand() limit 50");
                    echo '<ol>';
                    while ($soal_kuis = $sql->fetch_array()) {
                        echo '<li>';
                        echo htmlentities($soal_kuis['deskripsi']);

                        $sql2 = mysqli_query($conn, "SELECT * FROM jawaban_kuis WHERE id_soal='".$soal_kuis['id_soal']."' ORDER BY rand()");
                        echo '<ol type="A">';
                        while ($jawaban_kuis = $sql2->fetch_array()) {
                            echo '<li>';
                            echo '<input type="radio" name="jawaban['.$soal_kuis['id_soal'].']" value="'.$jawaban_kuis['id_jawaban'].'">'; //perhatikan name input radio nya, beda-beda untuk tiap pilihan jawaban
                            echo htmlentities($jawaban_kuis['deskripsi']);
                            echo '</li>';
                        }
                        echo '</ol><br>';
                        echo '</li>';       
                    }
                    echo '</ol>';
                }catch(Exception $e){
                    echo "Gagal menampilkan pertanyaan";
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