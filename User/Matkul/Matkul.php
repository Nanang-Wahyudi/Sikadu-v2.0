<?php
require 'Functions.php';
$data_matkul = query("SELECT * FROM matakuliah ORDER BY id_matakuliah DESC");

// if (isset($_POST["cari"])) {
//     $data_kependudukan = cari($_POST["keyword"]);
// }
?>

<div class="container mt-5">
    <h3 class="ml-4"><i class="fa-solid fa-book"></i>&ensp;Halaman Mata Kuliah</h3>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Mata Kuliah</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">SKS</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_matkul as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-3"><?= $data["nama_matkul"]; ?></td>
                    <td class="col-3"><?= $data["sks"]; ?></td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>