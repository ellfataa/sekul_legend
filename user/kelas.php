<<<<<<< HEAD
<?php
    include "../koneksi.php";

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kelas</title>
    <link rel="stylesheet" href="kelas.css" type="text/css">

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
                <li><a  class="dash2" href="kelas.php"><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href="https://calendar.google.com/"><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </nav>

    <center>
    <div class="menuKelas">
        <?php
            $sql = "select * from user where username = '" . $_SESSION['user'] . "' ";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
                echo "
                    <div>
                        <h2>Upload Kuis</h2><hr>
                        <a href='../kuis/up_kuis.php?id_user=" . $row['id_user'] . "'> Upload Kuis </a>
                    </div>

                    <div>
                        <h2>Upload Materi</h2><hr>
                        <a href='up_materi.php?id_user=" . $row['id_user'] . "'> Upload Materi </a>
                    </div>

                    <div>
                        <h2>Tambah Forum Diskusi</h2><hr>
                        <a href='../diskusi/tambah_topik.php?id_user=" . $row['id_user'] . "'> Tambah Diskusi </a>
                    </div>
                ";  
        ?>
    </div>
    </center>

    <div class="tampilKelas">
        <h1 class="judul">Menampilkan Kelas</h1>
        <table border="1" cellpadding="15" cellspasing="0">
            <tr>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php
                include '../koneksi.php';
                $result = mysqli_query($conn, "SELECT * FROM kelas");
                while($data = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$data['kd_kelas']."</td>";
                    echo "<td>".$data['nama_kelas']."</td>";
                    echo "<td><a href='edit_kelas.php?kd_kelas=$data[kd_kelas]'>Edit</a> | <a href='hapus_kelas.php?kd_kelas=$data[kd_kelas]'>Hapus</a></td></tr>";
                }
            ?>
        </table>
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
=======
<?php
    include "../koneksi.php";

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Guru</title>
    <link rel="stylesheet" href="home.css" type="text/css">

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
                <li><a  class="dash2" href=""><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href=""><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </nav>

    <div>
        <div>
            <?php
                $sql = "select * from user where username = '" . $_SESSION['user'] . "' ";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                    echo "
                        <h1>Upload Kuis</h1>
                        <a href='up_kuis.php?id_user=" . $row['id_user'] . "'> Upload Kuis </a>
                        <h1>Upload Materi</h1>
                        <a href='up_materi.php?id_user=" . $row['id_user'] . "'> Upload Materi </a>
                    ";  
            ?>
        </div>
    </div>


    <div>
        <h1 class="judul">Menampilkan Kelas</h1>
        <table>
            <tr>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php
                include '../koneksi.php';
                $result = mysqli_query($conn, "SELECT * FROM kelas");
                while($data = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$data['kd_kelas']."</td>";
                    echo "<td>".$data['nama_kelas']."</td>";
                    echo "<td><a href='edit_kelas.php?kd_kelas=$data[kd_kelas]'>Edit</a> | <a href='hapus_kelas.php?kd_kelas=$data[kd_kelas]'>Hapus</a></td></tr>";
                }
            ?>
        </table>
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
>>>>>>> c84d791d38dc44611a44515b5e28433b0c3cc909
