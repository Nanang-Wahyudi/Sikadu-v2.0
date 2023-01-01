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
    $nip             = htmlspecialchars($data["nip"]);
    $gelar_depan     = htmlspecialchars($data["gelar_depan"]);
    $nama_dosen      = htmlspecialchars($data["nama_dosen"]);
    $gelar_belakang  = htmlspecialchars($data["gelar_belakang"]);
    $id_fakultas     = htmlspecialchars($data["id_fakultas"]);
    $jekel_dosen     = htmlspecialchars($data["jekel_dosen"]);
    $alamat_dosen    = htmlspecialchars($data["alamat_dosen"]);

    $tambah = "INSERT INTO dosen (id_fakultas, nip, gelar_depan, nama_dosen, gelar_belakang, jenis_kelamin, alamat)
                   VALUES ('$id_fakultas', '$nip', '$gelar_depan', '$nama_dosen', '$gelar_belakang', '$jekel_dosen', '$alamat_dosen') ";

    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $hapus = "DELETE FROM dosen WHERE id_dosen = $id";
    mysqli_query($conn, $hapus);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id              = $data["id"];
    $nip             = htmlspecialchars($data["nip"]);
    $gelar_depan     = htmlspecialchars($data["gelar_depan"]);
    $nama_dosen      = htmlspecialchars($data["nama_dosen"]);
    $gelar_belakang  = htmlspecialchars($data["gelar_belakang"]);
    $id_fakultas     = htmlspecialchars($data["id_fakultas"]);
    $jekel_dosen     = htmlspecialchars($data["jekel_dosen"]);
    $alamat_dosen    = htmlspecialchars($data["alamat_dosen"]);

    mysqli_query($conn, "UPDATE dosen 
                         SET id_fakultas     = '$id_fakultas',
                             nip             = '$nip',  
                             gelar_depan     = '$gelar_depan',  
                             nama_dosen      = '$nama_dosen',  
                             gelar_belakang  = '$gelar_belakang',  
                             jenis_kelamin   = '$jekel_dosen',  
                             alamat          = '$alamat_dosen'  
                         WHERE id_dosen = $id
                    ");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $cari = "SELECT * FROM dosen 
             INNER JOIN fakultas ON dosen.id_fakultas = fakultas.id_fakultas
             WHERE nip           LIKE '%$keyword%' OR
                   nama_dosen    LIKE '%$keyword%' ";

    return query($cari);
}

?>