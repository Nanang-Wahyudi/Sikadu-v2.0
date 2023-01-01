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
    $nama_fakultas = htmlspecialchars($data["nama_fakultas"]);

    $tambah = "INSERT INTO fakultas (nama_fakultas) VALUES ('$nama_fakultas')";

    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $hapus = "DELETE FROM fakultas WHERE id_fakultas = $id";
    mysqli_query($conn, $hapus);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id            = $data["id"];
    $nama_fakultas = htmlspecialchars($data["nama_fakultas"]);

    mysqli_query($conn, "UPDATE fakultas SET nama_fakultas = '$nama_fakultas'  
                                         WHERE id_fakultas = $id
                    ");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $cari = "SELECT * FROM fakultas WHERE nama_fakultas LIKE '%$keyword%' ";

    return query($cari);
}

?>