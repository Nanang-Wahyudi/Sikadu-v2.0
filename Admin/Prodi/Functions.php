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
    $id_fakultas = htmlspecialchars($data["id_fakultas"]);
    $nama_prodi  = htmlspecialchars($data["nama_prodi"]);

    $tambah = "INSERT INTO prodi (id_fakultas, nama_prodi)
                   VALUES ('$id_fakultas', '$nama_prodi') ";
                   
    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $hapus = "DELETE FROM prodi WHERE id_prodi = $id";
    mysqli_query($conn, $hapus);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id            = $data["id"];
    $id_fakultas = htmlspecialchars($data["id_fakultas"]);
    $nama_prodi  = htmlspecialchars($data["nama_prodi"]);

    mysqli_query($conn, "UPDATE prodi 
                         SET id_fakultas = '$id_fakultas',
                             nama_prodi  = '$nama_prodi'  
                         WHERE id_prodi = $id
                    ");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $cari = "SELECT * FROM prodi 
             INNER JOIN fakultas ON prodi.id_fakultas = fakultas.id_fakultas
             WHERE nama_fakultas LIKE '%$keyword%' OR
                   nama_prodi    LIKE '%$keyword%' ";

    return query($cari);
}

?>