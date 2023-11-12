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
                <li><a  class="dash3" href="https://calendar.google.com"><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </nav>

    <div class="komentar">
        <?php
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $sql = "SELECT topik.*, user.nama from topik INNER JOIN user ON topik.id_user = user.id_user WHERE id = " . $_GET['id'];
                $query = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($query);
                if(empty($row)){
                    echo '<p class="text-warning">Topik Tidak Ditemukan</p>';
                }else{
                    ?>
                        <div class="komen1">
                            <div class="kolomKomen1">
                                <div class="isiKomen1"><?php echo htmlentities($row['nama']) ?></div>
                                <small><?php echo htmlentities($row['tanggal']); ?></small>
                            </div>
                        </div><br>

                        <hr>
                        <?php
                            $sql2 = "SELECT komentar.*, user.nama FROM komentar INNER JOIN user ON komentar.id_user = user.id_user WHERE id_topik = " . $_GET['id'] . " ORDER BY tanggal DESC";
                            $query2 = mysqli_query($conn, $sql2);
                            while($komentar = mysqli_fetch_array($query2))
                        ?>

                        <h2><?php echo htmlentities($row['judul']) ?></h2>
                        <p><?php echo nl2br (htmlentities($row['deskripsi'])) ?></p>

                        <hr>
                        <form action="jawab_topik.php" method="post">
                            <div>
                                <textarea name="komentar" cols="30" rows="10" placeholder="Jawab topik"></textarea>
                                <input type="hidden" value="<?php echo $row['id']; ?>">
                            </div>
                            <div>
                                <input type="submit" name="submit" value="Kirim">
                            </div>
                        </form>
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
