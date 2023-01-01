<?php
@$halaman = $_GET['halaman'];

if ($halaman == "mahasiswa") {
    include 'Mahasiswa/Mahasiswa.php';
} elseif ($halaman == "InputDataMahasiswa") {
    include 'Mahasiswa/Tambah.php';
} elseif ($halaman == "EditDataMahasiswa") {
    include 'Mahasiswa/Edit.php';
} elseif ($halaman == "HapusDataMahasiswa") {
    include 'Mahasiswa/Hapus.php';
} 
elseif ($halaman == "dosen") {
    include 'Dosen/Dosen.php';
} elseif ($halaman == "InputDataDosen") {
    include 'Dosen/Tambah.php';
} elseif ($halaman == "EditDataDosen") {
    include 'Dosen/Edit.php';
} elseif ($halaman == "HapusDataDosen") {
    include 'Dosen/Hapus.php';
}
elseif ($halaman == "fakultas") {
    include 'Fakultas/Fakultas.php';
} elseif ($halaman == "InputDataFakultas") {
    include 'Fakultas/Tambah.php';
} elseif ($halaman == "HapusDataFakultas") {
    include 'Fakultas/Hapus.php';
} elseif ($halaman == "EditDataFakultas") {
    include 'Fakultas/Edit.php';
}
elseif ($halaman == "prodi") {
    include 'Prodi/Prodi.php';
}elseif ($halaman == "InputDataProdi") {
    include 'Prodi/Tambah.php';
} elseif ($halaman == "HapusDataProdi") {
    include 'Prodi/Hapus.php';
} elseif ($halaman == "EditDataProdi") {
    include 'Prodi/Edit.php';
}
elseif ($halaman == "matkul") {
    include 'Matkul/Matkul.php';
} elseif ($halaman == "InputDataMatkul") {
    include 'Matkul/Tambah.php';
} elseif ($halaman == "EditDataMatkul") {
    include 'Matkul/Edit.php';
} elseif ($halaman == "HapusDataMatkul") {
    include 'Matkul/Hapus.php';
}
elseif ($halaman == "kbm") {
    include 'KBM/KBM.php';
} elseif ($halaman == "InputDatakbm") {
    include 'KBM/Tambah.php';
} elseif ($halaman == "EditDataKbm") {
    include 'KBM/Edit.php';
} elseif ($halaman == "HapusDataKbm") {
    include 'KBM/Hapus.php';
}
else {
    include 'Home/Home.php';
}

?>