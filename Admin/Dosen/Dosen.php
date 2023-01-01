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
        <h3 class="ml-4"><i class="fa-solid fa-chalkboard-user"></i>&ensp;Halaman Dosen</h3>
    </div>
    <div class="col-md-5">
        <form action="" method="POST" class="d-flex" role="search">
            <input class="form-control" type="search" name="keyword" placeholder="Nama Dosen/ NIP" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
        </form>
    </div>
</div>
<hr>

<div class="mt-5 ml-4">
    <a href="?halaman=InputDataDosen" class="btn btn-outline-success" type="submit"><i class="fa-solid fa-user-plus mr-2"></i>Tambah Data</a>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">NIP</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Gelar Depan</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Nama Lengkap</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Gelar Belakang</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Fakultas</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Jenis Kelamin</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Alamat</th>
                <th scope="col" class="col-3" colspan="2" style="background-color: lightgray;">Aksi</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_dosen as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <th scope="row" class="col-3"><?= $data["nip"]; ?></th>
                    <td class="col-3"><?= $data["gelar_depan"]; ?></td>
                    <td class="col-3"><?= $data["nama_dosen"]; ?></td>
                    <td class="col-3"><?= $data["gelar_belakang"]; ?></td>
                    <td class="col-3"><?= $data["nama_fakultas"]; ?></td>
                    <td class="col-3"><?= $data["jenis_kelamin"]; ?></td>
                    <td class="col-3"><?= $data["alamat"]; ?></td>
                    <td class="col-3">
                        <a href="?halaman=EditDataDosen&hal=edit&id=<?= $data["id_dosen"]; ?>" data-toogle="tooltip" title="Edit" class="btn btn-outline-warning me-2" type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                        <a href="?halaman=HapusDataDosen&hal=hapus&id=<?= $data["id_dosen"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ???');" data-toogle="tooltip" title="Hapus" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>