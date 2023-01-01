<?php
require "Functions.php";

$id   = $_GET["id"];
$data = query("SELECT * FROM kbm WHERE id_kbm = $id")[0];

if (isset($_POST["edit"])) {

    if (edit($_POST) > 0) {
        echo "
                <script>
                    alert('Edit Data Berhasil !!!');
                    document.location.href = '?halaman=kbm';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Edit Data Gagal !!!');
                    document.location.href = '?halaman=kbm';
                </script>
            ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3 class="ml-4"><i class="fa-solid fa-chalkboard-user"></i>&ensp;Input Data Dosen</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data["id_kbm"]; ?>">

                    <div class="form-group">
                        <label for="matkul">Mata Kuliah <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="matkul" id="matkul" aria-label="Default select example">
                            <option selected>--Pilih Mata Kuliah Terdaftar--</option>
                            <?php
                            $query_matkul = mysqli_query($conn, "SELECT * FROM matakuliah");
                            while ($data_matkul = mysqli_fetch_array($query_matkul)) {
                                echo '<option value="' . $data_matkul['id_matakuliah'] . '">' . $data_matkul['sks'] . ' SKS ' . ' - ' . $data_matkul['nama_matkul'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="nip" id="nip" aria-label="Default select example">
                            <option selected>--Pilih NIP Terdaftar--</option>
                            <?php
                            $query_dosen = mysqli_query($conn, "SELECT * FROM dosen");
                            while ($data_dosen = mysqli_fetch_array($query_dosen)) {
                                echo '<option value="' . $data_dosen['id_dosen'] . '">' . $data_dosen['nip'] . ' - ' . $data_dosen['nama_dosen'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="npm" id="npm" aria-label="Default select example">
                            <option selected>--Pilih NPM Terdaftar--</option>
                            <?php
                            $query_mhs = mysqli_query($conn, "SELECT * FROM mahasiswa");
                            while ($data_mhs = mysqli_fetch_array($query_mhs)) {
                                echo '<option value="' . $data_mhs['id_mahasiswa'] . '">' . $data_mhs['npm'] . ' - ' . $data_mhs['nama_mhs'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pertemuan">Pertemuan <span class="text-danger">*</span></label>
                        <input type="number" name="pertemuan" id="pertemuan" class="form-control" placeholder="--Masukan Jumlah Pertemuan Sekarang--" required autocomplete="off" value="<?= $data["pertemuan"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ruang">Ruang <span class="text-danger">*</span></label>
                        <input type="text" name="ruang" id="ruang" class="form-control" placeholder="--Masukan Nama Ruang Kelas--" required autocomplete="off" value="<?= $data["ruang"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam Perkuliahan <span class="text-danger">*</span></label>
                        <input type="text" name="jam" id="jam" class="form-control" placeholder="--Masukan Jam Perkuliahan--" required autocomplete="off" value="<?= $data["jam"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode <span class="text-danger">*</span></label>
                        <input type="number" name="kode" id="kode" class="form-control" placeholder="--Masukan Kode Perkuliahan--" required autocomplete="off" value="<?= $data["kode"]; ?>">
                    </div>

                    <div class="float-right mt-2">
                        <button type="submit" name="edit" class="btn btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=kbm" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>