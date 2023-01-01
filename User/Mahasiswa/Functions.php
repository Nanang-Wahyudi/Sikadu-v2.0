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
    $cari = "SELECT * FROM mahasiswa
             INNER JOIN fakultas ON mahasiswa.id_fakultas = fakultas.id_fakultas
             INNER JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi 
             WHERE nik      LIKE '%$keyword%' OR
                   npm      LIKE '%$keyword%' OR
                   nama_mhs LIKE '%$keyword%' ";

    return query($cari);
}

?>