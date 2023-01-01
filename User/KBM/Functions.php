<?php
// Koneksi Database
$conn = mysqli_connect("localhost", "root", "Nanang#220503", "sikadu_v2.0");

function query($tampil)
{
    global $conn;
    $result = mysqli_query($conn, $tampil);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword)
{
    $cari = "SELECT * FROM kbm 
             INNER JOIN mahasiswa  ON kbm.id_mahasiswa  = mahasiswa.id_mahasiswa
             INNER JOIN dosen      ON kbm.id_dosen      = dosen.id_dosen
             INNER JOIN matakuliah ON kbm.id_matakuliah = matakuliah.id_matakuliah
             WHERE nama_mhs LIKE '%$keyword%' ";

    return query($cari);
}
?>