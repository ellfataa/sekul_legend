<?php
    include '../koneksi.php';

    //INISIALISASI SESSION
    session_start();
    
    //MENGECEK APAKAH ADA USER YANG AKTIF, JIKA TIDAK ARAHKAN KE LOGIN.php
    if(!isset($_SESSION['user'])){
        header('Location: ../login.php');
    }

    if(!isset($_POST['id_topik']) || empty($_POST['id_topik'])){
        header('Location: diskusi.php');
    
        $komentar = $_POST['komentar'];
        $id_topik = $_POST['id_topik'];
        $id_user = $_GET['id_user'];

        $sql = "INSERT INTO komentar(komentar, tanggal, id_topik, id_user) VALUES ('$komentar', NOW(),'$id_topik','$id_user')";
        $query = mysqli_query($conn, $sql);

        if($query){
            header('Location: lihat_topik.php?id='.$_POST['id_topik']);
        }
    }
?>