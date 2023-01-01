<?php
require 'Functions.php';
$data_matkul = query("SELECT * FROM matakuliah ORDER BY id_matakuliah DESC");

if (isset($_POST["cari"])) {
    $data_matkul = cari($_POST["keyword"]);
}
?>

<div class="container mt-5">

</div>

<div class="container row mt-5">
    <div class="col-md-7">
        <h3 class="ml-4"><i class="fa-solid fa-book"></i>&ensp;Halaman Mata Kuliah</h3>
    </div>
    <div class="col-md-5">
        <form action="" method="POST" class="d-flex" role="search">
            <input class="form-control" type="search" name="keyword" placeholder="Nama Matkul/ SKS" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
        </form>
    </div>
</div>
<hr>

<div class="mt-5 ml-4">
    <a href="?halaman=InputDataMatkul" class="btn btn-outline-success" type="submit"><i class="fa-solid fa-user-plus mr-2"></i>Tambah Data</a>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Mata Kuliah</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">SKS</th>
                <th scope="col" class="col-3" colspan="2" style="background-color: lightgray;">Aksi</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_matkul as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-3"><?= $data["nama_matkul"]; ?></td>
                    <td class="col-3"><?= $data["sks"]; ?></td>
                    <td class="col-3">
                        <a href="?halaman=EditDataMatkul&hal=edit&id=<?= $data["id_matakuliah"]; ?>" data-toogle="tooltip" title="Edit" class="btn btn-outline-warning me-2" type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                        <a href="?halaman=HapusDataMatkul&hal=hapus&id=<?= $data["id_matakuliah"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ???');" data-toogle="tooltip" title="Hapus" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>