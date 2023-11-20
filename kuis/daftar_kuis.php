<!DOCTYPE html>
<html>
    <head>
        <title>Kuis Sederhana</title>
    </head>
    <body>
        <h1>Daftar Kuis</h1>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Judul Soal</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "../koneksi.php";
                $no = 1;
                $select = mysqli_query($conn, "SELECT * FROM soal");
                while ($row = mysqli_fetch_array($select)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['judul_soal'] . "</td>";
                    echo "<td><a href='kuis.php?id_soal=" . $row['id_soal'] . "'>Kerjakan</a></td>";
                    echo "</tr>";
                }
            ?>