<?php
    include '../koneksi.php';

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
    <title>Admin</title>
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

    <div class="row2">
        <a href="tambah_topik.php">Tambah Topik</a><br><br>
        <h2>Daftar Topik</h2>
        <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                $sql = "SELECT id, judul, tanggal from topik INNER JOIN user ON topik.id_user = user.id_user ORDER BY tanggal DESC";
                $query = mysqli_query($conn, $sql);
            ?>
            <?php
            while($row = mysqli_fetch_array($query)){?>
            <div>
                <div>
                    
                </div>
            </div>
            <figure>
                <blockquote class="blockquote">
                    <p>
                        <a href="lihat_topik.php?id=<?php echo $row['id']; ?>"><?php echo htmlentities($row['judul']); ?></a>
                    </p>
                </blockquote>
                <figcaption>
                    Tanggal buat: <?php echo htmlentities($row['tanggal']); ?><br><br>
                </figcaption>
            </figure>
            <?php
                }
            }
        ?>
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
