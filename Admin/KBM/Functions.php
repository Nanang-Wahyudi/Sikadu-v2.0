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
    $matkul      = htmlspecialchars($data["matkul"]);
    $nip         = htmlspecialchars($data["nip"]);
    $npm         = htmlspecialchars($data["npm"]);
    $pertemuan   = htmlspecialchars($data["pertemuan"]);
    $ruang       = htmlspecialchars($data["ruang"]);
    $jam         = htmlspecialchars($data["jam"]);
    $kode        = htmlspecialchars($data["kode"]);

    $tambah = "INSERT INTO kbm (id_matakuliah, id_dosen, id_mahasiswa, pertemuan, ruang, jam, kode)
                   VALUES ('$matkul', '$nip', '$npm', '$pertemuan', '$ruang', '$jam', '$kode') ";

    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $hapus = "DELETE FROM kbm WHERE id_kbm = $id";
    mysqli_query($conn, $hapus);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id          = $data["id"];
    $matkul      = htmlspecialchars($data["matkul"]);
    $nip         = htmlspecialchars($data["nip"]);
    $npm         = htmlspecialchars($data["npm"]);
    $pertemuan   = htmlspecialchars($data["pertemuan"]);
    $ruang       = htmlspecialchars($data["ruang"]);
    $jam         = htmlspecialchars($data["jam"]);
    $kode        = htmlspecialchars($data["kode"]);

    mysqli_query($conn, "UPDATE kbm 
                         SET id_matakuliah = '$matkul',
                             id_dosen      = '$nip',  
                             id_mahasiswa  = '$npm',  
                             pertemuan     = '$pertemuan',  
                             ruang         = '$ruang',  
                             jam           = '$jam',  
                             kode          = '$kode'  
                         WHERE id_kbm      = $id
                    ");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $cari = "SELECT * FROM kbm 
             INNER JOIN mahasiswa  ON kbm.id_mahasiswa  = mahasiswa.id_mahasiswa
             INNER JOIN dosen      ON kbm.id_dosen      = dosen.id_dosen
             INNER JOIN matakuliah ON kbm.id_matakuliah = matakuliah.id_matakuliah
             WHERE npm           LIKE '%$keyword%' OR 
                   nip           LIKE '%$keyword%' ";

    return query($cari);
}

?>