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
    $nik          = htmlspecialchars($data["nik"]);
    $npm          = htmlspecialchars($data["npm"]);
    $nama         = htmlspecialchars($data["nama"]);
    $email        = htmlspecialchars($data["email"]);
    $tmp_lahir    = htmlspecialchars($data["tmp_lahir"]);
    $tgl_lahir    = htmlspecialchars($data["tgl_lahir"]);
    $jekel        = htmlspecialchars($data["jekel"]);
    $no_tlp       = htmlspecialchars($data["no_tlp"]);
    $alamat       = htmlspecialchars($data["alamat"]);
    $id_fakultas  = htmlspecialchars($data["id_fakultas"]);
    $id_prodi     = htmlspecialchars($data["id_prodi"]);
    $jenjang      = htmlspecialchars($data["jenjang"]);
    $kelas        = htmlspecialchars($data["kelas"]);
    $kelompok     = htmlspecialchars($data["kelompok"]);
    $status       = htmlspecialchars($data["status"]);

    $tambah = "INSERT INTO mahasiswa (nik, npm, nama_mhs, email, tempat_lahir, tanggal_lahir, jenis_kelamin, nomor_telpon, 
                                        alamat, id_fakultas, id_prodi, jenjang, kelas, kelompok, status_mhs)
                   VALUES ('$nik', '$npm', '$nama', '$email', '$tmp_lahir', '$tgl_lahir', '$jekel', '$no_tlp',
                            '$alamat', '$id_fakultas', '$id_prodi', '$jenjang', '$kelas', '$kelompok', '$status') ";

    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $hapus = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id";
    mysqli_query($conn, $hapus);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id            = $data["id"];
    $nik          = htmlspecialchars($data["nik"]);
    $npm          = htmlspecialchars($data["npm"]);
    $nama         = htmlspecialchars($data["nama"]);
    $email        = htmlspecialchars($data["email"]);
    $tmp_lahir    = htmlspecialchars($data["tmp_lahir"]);
    $tgl_lahir    = htmlspecialchars($data["tgl_lahir"]);
    $jekel        = htmlspecialchars($data["jekel"]);
    $no_tlp       = htmlspecialchars($data["no_tlp"]);
    $alamat       = htmlspecialchars($data["alamat"]);
    $id_fakultas  = htmlspecialchars($data["id_fakultas"]);
    $id_prodi     = htmlspecialchars($data["id_prodi"]);
    $jenjang      = htmlspecialchars($data["jenjang"]);
    $kelas        = htmlspecialchars($data["kelas"]);
    $kelompok     = htmlspecialchars($data["kelompok"]);
    $status       = htmlspecialchars($data["status"]);

    mysqli_query($conn, "UPDATE mahasiswa 
                         SET nik           = '$nik',
                             npm           = '$npm',  
                             nama_mhs      = '$nama',  
                             email         = '$email',  
                             tempat_lahir  = '$tmp_lahir',  
                             tanggal_lahir = '$tgl_lahir',  
                             jenis_kelamin = '$jekel',  
                             nomor_telpon  = '$no_tlp',  
                             alamat        = '$alamat',  
                             id_fakultas   = '$id_fakultas',  
                             id_prodi      = '$id_prodi',  
                             jenjang       = '$jenjang',  
                             kelas         = '$kelas',  
                             kelompok      = '$kelompok',  
                             status_mhs    = '$status'  
                         WHERE id_mahasiswa = $id
                    ");

    return mysqli_affected_rows($conn);
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