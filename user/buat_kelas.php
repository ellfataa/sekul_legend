<<<<<<< HEAD
<?php
    include '../koneksi.php';

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //MEMBUAT KELAS BARU
    if (isset($_POST['Submit'])) {
        $kd_kelas = $_POST['kd_kelas'];
        $nama_kelas = $_POST['nama_kelas'];
        include ("../koneksi.php");
    
        $result = mysqli_query($conn, "INSERT INTO kelas(kd_kelas, nama_kelas) VALUES('$kd_kelas','$nama_kelas')");
    
        if($result){
			?>
				<script>alert('Data Berhasil Ditambahkan!')
				document.location="kelas.php";
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
    <title>Admin</title>
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
                <li><a class="dash1" href="admin.php"><img src="../gambar/home.svg" alt="Home">Home</a></li><br>
                <li><a  class="dash2" href="kelas.php"><img src="../gambar/kelas.svg" alt="Kelas">Kelas</a></li><br>
                <li><a  class="dash3" href=""><img src="../gambar/kalender.svg" alt="Kalender">Kalender</a></li>
            </div>
        </ul>

        <p class="namalogo">Sekul Legend</p>

        <div class="menu-header">
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </nav>

    <div class="buatKelas">
        <center>
            <h1>Buat Kelas</h1><br>
            <form action="buat_kelas.php" method="POST">
                <table>
                    <tr class="kdKelas">
                        <td>Kode Kelas</td>
                        <td>: </td>
                        <td><input type="text" name="kd_kelas" /></td>
                    </tr>
                    <tr class="nmKelas">
                        <td>Nama Kelas</td>
                        <td>: </td>
                        <td><input type="text" name="nama_kelas" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input class="inputKelas" type="submit" name="Submit" /></td>
                    </tr>
                </table>
            </form>
        </center>
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
    include '../koneksi.php';

    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //MEMBUAT KELAS BARU
    if (isset($_POST['Submit'])) {
        $kd_kelas = $_POST['kd_kelas'];
        $nama_kelas = $_POST['nama_kelas'];
        include ("../koneksi.php");
    
        $result = mysqli_query($conn, "INSERT INTO kelas(kd_kelas, nama_kelas) VALUES('$kd_kelas','$nama_kelas')");
    
        if($result){
			?>
				<script>alert('Data Berhasil Ditambahkan!')
				document.location="kelas.php";
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
    <title>Admin</title>
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

<center>
    <h1>Buat Kelas</h1>
    <form action="buat_kelas.php" method="POST">
        <table>
            <tr>
                <td>Kode Kelas</td>
                <td><input type="text" name="kd_kelas" /></td>
            </tr>
            <tr>
                <td>Nama Kelas</td>
                <td><input type="text" name="nama_kelas" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" /></td>
            </tr>
        </table>
    </form>
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
>>>>>>> c84d791d38dc44611a44515b5e28433b0c3cc909
