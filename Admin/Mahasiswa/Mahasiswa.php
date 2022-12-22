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
                <th scope="col" class="col-2" style="background-color: lightgray;">NIK</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">NPM</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Nama Lengkap</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Email</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Tempat Lahir</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Tanggal Lahir</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Jenis Kelamin</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">No.Telepon</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Alamat</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Fakultas</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Program Studi</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Jenjang</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Kelas</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Kelompok</th>
                <th scope="col" class="col-2" style="background-color: lightgray;">Status</th>
                <th scope="col" class="col-2" colspan="2" style="background-color: lightgray;">Aksi</th>
            </tr>
        </thead>

        <?php $no = 1; ?>
        <?php foreach ($data_mahasiswa as $data) : ?>

            <tbody>
                <tr class="d-flex">
                    <th scope="row" class="col-1"><?= $no; ?></th>
                    <th scope="row" class="col-2"><?= $data["nik"]; ?></th>
                    <td class="col-2"><?= $data["npm"]; ?></td>
                    <td class="col-2"><?= $data["nama_mhs"]; ?></td>
                    <td class="col-2"><?= $data["email"]; ?></td>
                    <td class="col-2"><?= $data["tempat_lahir"]; ?></td>
                    <td class="col-2"><?= $data["tanggal_lahir"]; ?></td>
                    <td class="col-2"><?= $data["jenis_kelamin"]; ?></td>
                    <td class="col-2"><?= $data["nomor_telpon"]; ?></td>
                    <td class="col-2"><?= $data["alamat"]; ?></td>
                    <td class="col-2"><?= $data["nama_fakultas"]; ?></td>
                    <td class="col-2"><?= $data["nama_prodi"]; ?></td>
                    <td class="col-2"><?= $data["jenjang"]; ?></td>
                    <td class="col-2"><?= $data["kelas"]; ?></td>
                    <td class="col-2"><?= $data["kelompok"]; ?></td>
                    <td class="col-2">
                        <span class="pt-2 pb-2 pl-4 pr-4 text-white font-weight-bold bg-success rounded"><?= $data["status"]; ?></span>
                    </td>
                    <td class="col-2">
                        <a href="?halaman=EditDataMahasiswa&hal=edit&id=<?= $data["id_mahasiswa"]; ?>" data-toogle="tooltip" title="Edit" class="btn btn-outline-warning me-2" type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                        <a href="?halaman=HapusDataMahasiswa&hal=hapus&id=<?= $data["id_mahasiswa"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ???');" data-toogle="tooltip" title="Hapus" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>