<?php
require 'Functions.php';
$data_dosen = query("SELECT * FROM dosen 
                         INNER JOIN fakultas ON dosen.id_fakultas = fakultas.id_fakultas
                         ORDER BY id_dosen DESC");

// if (isset($_POST["cari"])) {
//     $data_kependudukan = cari($_POST["keyword"]);
// }
?>


<div class="container mt-5">
    <h3 class="ml-4"><i class="fa-solid fa-chalkboard-user"></i>&ensp;Halaman Dosen</h3>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Nama Lengkap</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Fakultas</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Jenis Kelamin</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_dosen as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-3"><?= $data["gelar_depan"].". ".$data["nama_dosen"].", ".$data["gelar_belakang"]; ?></td>
                    <td class="col-3"><?= $data["nama_fakultas"]; ?></td>
                    <td class="col-3"><?= $data["jenis_kelamin"]; ?></td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>