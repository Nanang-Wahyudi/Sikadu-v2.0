<?php
@$halaman = $_GET['halaman'];

if ($halaman == "mahasiswa") {
    include 'Mahasiswa/Mahasiswa.php';
}
elseif ($halaman == "dosen") {
    include 'Dosen/Dosen.php';
}
elseif ($halaman == "fakultas") {
    include 'Fakultas/Fakultas.php';
}
elseif ($halaman == "prodi") {
    include 'Prodi/Prodi.php';
}
elseif ($halaman == "matkul") {
    include 'Matkul/Matkul.php';
}
elseif ($halaman == "kbm") {
    include 'KBM/KBM.php';
} 
else {
    include 'Home/Home.php';
}

?>