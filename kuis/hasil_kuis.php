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
    <title>Hasil Kuis</title>
</head>
<body>
    <h1>Hasil Kuis</h1>
    <?php
        if(empty($_POST['jawaban_kuis']) === false){
            echo '<ol>';
            $totalSkor = 0;
            foreach($_POST['jawaban_kuis'] as $key => $value){
                //QUERY SOAL
                $data_soal = mysqli_query($conn, "SELECT * FROM soal_kuis WHERE id_soal = :id_soal ");
                $soal_kuis = mysqli_fetch_array($data_soal);
                echo '<li>'.htmlentities($soal_kuis['deskripsi']);

                //QUERY JAWABAN
                $data_jawaban = mysqli_query($conn, "SELECT * FROM jawaban_kuis WHERE id_jawaban = :id_jawaban ");
                $jawaban_kuis = mysqli_fetch_array($data_jawaban);
                if($jawaban_kuis['benar'] == 1){
                    echo ' <strong>(Benar)</strong>';
                    $totalSkor += $soal_kuis['skor'];        
                }else{
                    echo ' <strong>(Salah)</strong>';
                }
                echo '</li>';
            echo '</ol>';
            }
            echo '<h3>Total Skor: '.$totalSkor.'</h3>';
        }
    ?>
</body>
</html>