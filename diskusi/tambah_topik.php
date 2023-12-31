<?php
    include "../koneksi.php";

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    if(isset($_POST['submit'])){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $id_user = $_GET['id_user'];

        $sql = "INSERT INTO topik(judul, deskripsi, id_user) VALUES ('$judul', '$deskripsi','$id_user')";
        $query = mysqli_query($conn, $sql);

        if($query){
            header('Location: diskusi.php');
            ?>
            <!-- HTML -->
            <script>
                alert('Topik Berhasil Ditambahkan!');
            </script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Topik</title>
    <link rel="stylesheet" href="discusion.css" type="text/css">

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

    <center>
    <div class="tambahDiskusi">
        <h1>Tambah Forum Diskusi</h1><br>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <center>
                <label for="judul">Judul</label><br>
                <input type="text" id="judul" name="judul" placeholder="Masukkan Judul" required><br><br>

                <label for="deskripsi">Deskripsi</label><br>
                <textarea type="text" id="deskripsi" name="deskripsi"></textarea><br><br>

                <input class="tmbhKls" type="submit" name="submit" value="Kirim">
            </center>
        </form>
    </div>
    </center>

    <script>
        const toggle = document.querySelector('.toggle input');
        const nav = document.querySelector('nav ul');

        toggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>
</html>