<?php
    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //UPLOAD MATERI
    include "../koneksi.php";
	
    if (isset($_POST['Submit'])) {
        $kd_materi = $_POST['kd_materi'];
        $judul = $_POST['judul'];
        $direktori = '../materi/';
        $file_materi = $_FILES['file_materi']['name'];
		move_uploaded_file($_FILES['file_materi']['tmp_name'], $direktori.$file_materi);
    
        $result = mysqli_query($conn, "INSERT INTO materi(kd_materi, judul, file_materi) VALUES('$kd_materi','$judul','$file_materi')");
    
        if($result){
			?>
				<script>alert('Materi Berhasil Ditambahkan!')
				//document.location="kelas.php";
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
    <h1>Upload Materi</h1>
    <form action="view_materi.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Kode Materi</td>
                <td><input type="text" name="kd_materi" /></td>
            </tr>
            <tr>
                <td>Judul Materi</td>
                <td><input type="text" name="judul" /></td>
            </tr>
            <tr>
                <td>Input File</td>
                <td><input type="file" name="file_materi" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Submit" />
                </td>
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