<?php
require 'Functions.php';
$data_kbm = query("SELECT * FROM kbm 
                    INNER JOIN matakuliah ON kbm.id_matakuliah = matakuliah.id_matakuliah
                    INNER JOIN dosen ON kbm.id_dosen = dosen.id_dosen
                    INNER JOIN mahasiswa ON kbm.id_mahasiswa = mahasiswa.id_mahasiswa
                    ORDER BY id_kbm DESC");

if (isset($_POST["cari"])) {
    $data_kbm = cari($_POST["keyword"]);
}
?>


<div class="container row mt-5">
    <div class="col-md-7">
        <h3><i class="fa-solid fa-person-chalkboard"></i>&ensp;Halaman Kegiatan Belajar Mengajar</h3>
    </div>
    <div class="col-md-5">
        <form action="" method="POST" class="d-flex" role="search">
            <input class="form-control" type="search" name="keyword" placeholder="NPM / NIP" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
        </form>
    </div>
</div>
<hr>

<div class="mt-5 ml-4">
    <a href="?halaman=InputDatakbm" class="btn btn-outline-success" type="submit"><i class="fa-solid fa-user-plus mr-2"></i>Tambah Data</a>
</div>

<div id="table-mahasiswa" class="container table-responsive text-center">
    <table class="table border-secondary mt-4 table-bordered">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-1" style="background-color: lightgray;">No</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Mata Kuliah</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">SKS</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Nama Dosen</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">NIP</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Nama Mahasiswa</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">NPM</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Kelompok</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Pertemuan</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Ruang</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Jam</th>
                <th scope="col" class="col-3" style="background-color: lightgray;">Kode</th>
                <th scope="col" class="col-3" colspan="2" style="background-color: lightgray;">Aksi</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_kbm as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <td class="col-3"><?= $data["nama_matkul"]; ?></td>
                    <td class="col-3"><?= $data["sks"]; ?></td>
                    <td class="col-3"><?= $data["gelar_depan"] . ". " . $data["nama_dosen"] . ", " . $data["gelar_belakang"]; ?></td>
                    <td class="col-3"><?= $data["nip"]; ?></td>
                    <td class="col-3"><?= $data["nama_mhs"]; ?></td>
                    <td class="col-3"><?= $data["npm"]; ?></td>
                    <td class="col-3"><?= $data["kelas"] . "/" . $data["kelompok"] . "/" . $data["jenjang"]; ?></td>
                    <td class="col-3"><?= $data["pertemuan"]; ?></td>
                    <td class="col-3"><?= $data["ruang"]; ?></td>
                    <td class="col-3"><?= $data["jam"]; ?></td>
                    <td class="col-3"><?= $data["kode"]; ?></td>
                    <td class="col-3">
                        <a href="?halaman=EditDataKbm&hal=edit&id=<?= $data["id_kbm"]; ?>" data-toogle="tooltip" title="Edit" class="btn btn-outline-warning me-2" type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                        <a href="?halaman=HapusDataKbm&hal=hapus&id=<?= $data["id_kbm"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ???');" data-toogle="tooltip" title="Hapus" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>