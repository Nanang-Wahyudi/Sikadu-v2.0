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

function tambah($data)
{
    global $conn;
    $matkul = htmlspecialchars($data["matkul"]);
    $sks  = htmlspecialchars($data["sks"]);

    $tambah = "INSERT INTO matakuliah (nama_matkul, sks)
                   VALUES ('$matkul', '$sks') ";

    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $hapus = "DELETE FROM matakuliah WHERE id_matakuliah = $id";
    mysqli_query($conn, $hapus);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id            = $data["id"];
    $matkul = htmlspecialchars($data["matkul"]);
    $sks  = htmlspecialchars($data["sks"]);

    mysqli_query($conn, "UPDATE matakuliah 
                         SET nama_matkul = '$matkul',
                             sks         = '$sks'  
                         WHERE id_matakuliah = $id
                    ");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $cari = "SELECT * FROM matakuliah 
             WHERE nama_matkul   LIKE '%$keyword%' OR
                   sks           LIKE '%$keyword%' ";

    return query($cari);
}


?>