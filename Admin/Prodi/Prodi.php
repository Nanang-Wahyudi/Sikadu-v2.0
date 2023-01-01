<?php
require 'Functions.php';
$data_prodi = query("SELECT * FROM prodi 
                     INNER JOIN fakultas ON prodi.id_fakultas = fakultas.id_fakultas
                     ORDER BY id_prodi DESC");

if (isset($_POST["cari"])) {
    $data_prodi = cari($_POST["keyword"]);
}
?>


<div class="container row mt-5">
    <div class="col-md-7">
        <h3 class="ml-2"><i class="fa-solid fa-school"></i>&ensp;Halaman Program Studi</h3>
    </div>
    <div class="col-md-5">
        <form action="" method="POST" class="d-flex" role="search">
            <input class="form-control" type="search" name="keyword" placeholder="Nama Fakultas/ Prodi" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
        </form>
    </div>
</div>
<hr>

<div class="mt-5 ml-4">
    <a href="?halaman=InputDataProdi" class="btn btn-outline-success" type="submit"><i class="fa-solid fa-user-plus mr-2"></i>Tambah Data</a>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Fakultas</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Program Studi</th>
                <th scope="col" class="col-3" colspan="2" style="background-color: lightgray;">Aksi</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_prodi as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-3"><?= $data["nama_fakultas"]; ?></td>
                    <td class="col-3"><?= $data["nama_prodi"]; ?></td>
                    <td class="col-3">
                        <a href="?halaman=EditDataProdi&hal=edit&id=<?= $data["id_prodi"]; ?>" data-toogle="tooltip" title="Edit" class="btn btn-outline-warning me-2" type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                        <a href="?halaman=HapusDataProdi&hal=hapus&id=<?= $data["id_prodi"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ???');" data-toogle="tooltip" title="Hapus" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>