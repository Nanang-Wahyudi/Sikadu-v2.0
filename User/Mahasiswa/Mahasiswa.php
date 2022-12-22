<?php
require 'Functions.php';
$data_mahasiswa = query("SELECT * FROM mahasiswa 
                         INNER JOIN fakultas ON mahasiswa.id_fakultas = fakultas.id_fakultas
                         INNER JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi
                         ORDER BY id_mahasiswa DESC");

// if (isset($_POST["cari"])) {
//     $data_kependudukan = cari($_POST["keyword"]);
// }
?>


<div class="container mt-5">
    <h3 class="ml-4"><i class="fa-solid fa-user-graduate"></i>&ensp;Halaman Mahasiswa</h3>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Nama Lengkap</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Jenis Kelamin</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Fakultas</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Program Studi</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Jenjang</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Kelas</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Status</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_mahasiswa as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-3"><?= $data["nama_mhs"]; ?></td>
                    <td class="col-3"><?= $data["jenis_kelamin"]; ?></td>
                    <td class="col-3"><?= $data["nama_fakultas"]; ?></td>
                    <td class="col-3"><?= $data["nama_prodi"]; ?></td>
                    <td class="col-3"><?= $data["jenjang"]; ?></td>
                    <td class="col-3"><?= $data["kelas"]; ?></td>
                    <td class="col-3">
                        <span class="pt-2 pb-2 pl-4 pr-4 text-white font-weight-bold bg-success rounded"><?= $data["status"]; ?></span>
                    </td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>