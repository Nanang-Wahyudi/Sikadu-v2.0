<?php
require 'Functions.php';
$data_dosen = query("SELECT * FROM dosen 
                         INNER JOIN fakultas ON dosen.id_fakultas = fakultas.id_fakultas
                         ORDER BY id_dosen DESC");

if (isset($_POST["cari"])) {
    $data_dosen = cari($_POST["keyword"]);
}
?>


<div class="container row mt-5">
    <div class="col-md-7">
        <h3 class="ml-5"><i class="fa-solid fa-chalkboard-user"></i>&ensp;Dosen</h3>
    </div>
    <div class="col-md-5">
        <form action="" method="POST" class="d-flex" role="search">
            <input class="form-control" type="search" name="keyword" placeholder="Nama Dosen" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
        </form>
    </div>
</div>
<hr>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-4" style="background-color: lightgray;">Nama Lengkap</th>
                <th scope="col" class="col-4" style="background-color: lightgray;">Fakultas</th>
                <th scope="col" class="col-4" style="background-color: lightgray;">Jenis Kelamin</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_dosen as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-4"><?= $data["gelar_depan"] . ". " . $data["nama_dosen"] . ", " . $data["gelar_belakang"]; ?></td>
                    <td class="col-4"><?= $data["nama_fakultas"]; ?></td>
                    <td class="col-4"><?= $data["jenis_kelamin"]; ?></td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>