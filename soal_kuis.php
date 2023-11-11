<?php
    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //UPLOAD MATERI
    include '../koneksi.php';
            // if(isset($_POST['submit'])){
            //     $jawaban = $_GET['jawaban'];
            //     echo "Anda mengklik tombol submit";
        
            //     if(count($jawaban)==0){
            //         echo "Anda belum menjawab soal";
            //     }else{
            //         foreach($jawaban as $nmr => $nilai){
            //             $data_soal = mysqli_query($conn, "SELECT * FROM kuis WHERE nomor='$nmr'");
            //             $data_jawab = mysqli_fetch_assoc($data_soal);
            //             if($nilai == $data_jawab['jawaban']){
            //                 $benar++;}
            //         }
            //     echo $benar;
            //     }
            // }   
            // $nmr = 0;
            // $soal = mysqli_query($conn, "SELECT * FROM kuis");
            // while($data = mysqli_fetch_assoc($soal)){
            //     $nmr++;
            //     echo $nmr .". ". $data['pertanyaan'] ."<br>";
            //     echo "A. <input type='radio' value='a' name='jawaban[" .$data["nomor"]. "]' />". $data['jawab_a'] ."<br>";
            //     echo "B. <input type='radio' value='b' name='jawaban[" .$data["nomor"]. "]' />". $data['jawab_b'] ."<br>";
            //     echo "C. <input type='radio' value='c' name='jawaban[" .$data["nomor"]. "]' />". $data['jawab_c'] ."<br>";
            //     echo "D. <input type='radio' value='d' name='jawaban[" .$data["nomor"]. "]' />". $data['jawab_d'] ."<br><br>";
            // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="kuis.css" type="text/css">

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
                <li><a class="dash1" href="../index.php"><img src="../gambar/home.svg" alt="Home">Dashboard</a></li><br>
                <li><a  class="dash2" href=""><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href=""><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </nav>

    <h1>Soal Kuis</h1>
    <form action="" method="post">
        <table>  
            <tr>
                <td>
                    <label for="pertanyaan">Pertanyaan</label>
                </td>
                <td>
                    <input type="text" name="pertanyaan">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="pilihan">Pilihan Ganda</label>
                </td>
                <td>
                    <textarea name="pilihan" cols="30" rows="10"></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="jawaban_benar">Jawaban Benar</label>
                </td>
                <td>
                    <input type="text" name="jawaban_benar">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Buat Kuis">
                </td>
            </tr>
        </table>
    </form>

    <script>
        const toggle = document.querySelector('.toggle input');
        const nav = document.querySelector('nav ul');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>
</html>