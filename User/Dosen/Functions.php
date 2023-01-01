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
    $cari = "SELECT * FROM dosen 
             INNER JOIN fakultas ON dosen.id_fakultas = fakultas.id_fakultas
             WHERE nama_dosen    LIKE '%$keyword%' ";

    return query($cari);
}

?>