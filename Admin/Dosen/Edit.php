<?php
require "Functions.php";

$id   = $_GET["id"];
$data = query("SELECT * FROM dosen WHERE id_dosen = $id")[0];

if (isset($_POST["edit"])) {

    if (edit($_POST) > 0) {
        echo "
                <script>
                    alert('Edit Data Berhasil !!!');
                    document.location.href = '?halaman=dosen';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Edit Data Gagal !!!');
                    document.location.href = '?halaman=dosen';
                </script>
            ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3 class="ml-4"><i class="fa-solid fa-chalkboard-user"></i>&ensp;Edit Data Dosen</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data["id_dosen"]; ?>">

                    <div class="form-group">
                        <label for="nip">NIP <span class="text-danger">*</span></label>
                        <input type="number" name="nip" id="nip" class="form-control" placeholder="--Masukan NIP Dosen--" required autocomplete="off" value="<?= $data["nip"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gelar_depan">Gelar Depan</label>
                        <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" placeholder="--Masukan Gelar Depan--" autocomplete="off" value="<?= $data["gelar_depan"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" placeholder="--Masukan Nama Lengkap Dosen--" required autocomplete="off" value="<?= $data["nama_dosen"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gelar_belakang">Gelar Belakang <span class="text-danger">*</span></label>
                        <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control" placeholder="--Masukan Nama Lengkap Dosen--" required autocomplete="off" value="<?= $data["gelar_belakang"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_fakultas">Fakultas <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="id_fakultas" id="id_fakultas" aria-label="Default select example">
                            <option selected>--Pilih Fakultas Terdaftar--</option>
                            <?php
                            $query_fakultas = mysqli_query($conn, "SELECT * FROM fakultas");
                            while ($data_fakultas = mysqli_fetch_array($query_fakultas)) {
                                echo '<option value="' . $data_fakultas['id_fakultas'] . '">' . $data_fakultas['nama_fakultas'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jekel_dosen">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select custom-select" name="jekel_dosen" aria-label="Default select example">
                            <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="Pria" <?php if ($data['jenis_kelamin'] == 'Pria') {
                                                        echo 'selected';
                                                    } ?>>Pria</option>
                            <option value="Wanita" <?php if ($data['jenis_kelamin'] == 'Wanita') {
                                                        echo 'selected';
                                                    } ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_dosen">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat_dosen" id="alamat_dosen" class="form-control" cols="20" rows="5" placeholder="--Masukan Alamat Lengkap--" autocomplete="off" required><?= $data["alamat"] ?></textarea>
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="edit" class="btn btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=dosen" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>