<<<<<<< HEAD
<?php
    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //VIEW MATERI
    include "../koneksi.php";
    $tgl = date('Y-m-d h:i:s');

    // $del = $_GET['del'];
    // if($del!=""){
    //     $delete = "delete from materi where kd_materi='$del' ";
    //     $query=mysqli_query($conn,$delete);
    //     if($query){
            /* ?>
             <script>alert('Data Berhasil Dihapus');document.location='view_materi.php';</script>
             <?php*/
    //     }
    // }

$sql = "select * from materi where 1 ";
$query = mysqli_query($conn,$sql);

?>
<h3><center><a href='up_materi.php'>Tambah Data</a></center></h3>
<table border='1' align='center'>
	<tr>
		<th>No</th>
		<th>Nama Materi</th>
        <th>Tanggal Upload</th>
        <th>File Materi</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no = 1;
	while($row = mysqli_fetch_array($query)){
		echo "
		<tr>
			<td>$no</td>
			<td>$row[kd_materi]</td>
			<td>$row[tgl_upload]</td>
			<td>$row[file_materi]</td>
	<td><a href='up_materi.php?upd=$row[kd_materi]'>Update</a> | 
	<a href='view_motor.php?del=$row[kd_materi]'>Delete</a></td>
		</tr>
		";
		$no++;
	}
	?>
	
=======
<?php
    //INISIALISASI SESSION
    session_start();

    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    //VIEW MATERI
    include "../koneksi.php";
    $tgl = date('Y-m-d h:i:s');

    // $del = $_GET['del'];
    // if($del!=""){
    //     $delete = "delete from materi where kd_materi='$del' ";
    //     $query=mysqli_query($conn,$delete);
    //     if($query){
            /* ?>
             <script>alert('Data Berhasil Dihapus');document.location='view_materi.php';</script>
             <?php*/
    //     }
    // }

$sql = "select * from materi where 1 ";
$query = mysqli_query($conn,$sql);

?>
<h3><center><a href='up_materi.php'>Tambah Data</a></center></h3>
<table border='1' align='center'>
	<tr>
		<th>No</th>
		<th>Nama Materi</th>
        <th>Tanggal Upload</th>
        <th>File Materi</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no = 1;
	while($row = mysqli_fetch_array($query)){
		echo "
		<tr>
			<td>$no</td>
			<td>$row[kd_materi]</td>
			<td>$row[tgl_upload]</td>
			<td>$row[file_materi]</td>
	<td><a href='up_materi.php?upd=$row[kd_materi]'>Update</a> | 
	<a href='view_motor.php?del=$row[kd_materi]'>Delete</a></td>
		</tr>
		";
		$no++;
	}
	?>
	
>>>>>>> c84d791d38dc44611a44515b5e28433b0c3cc909
</table>