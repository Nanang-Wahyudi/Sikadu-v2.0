<?php
require "Functions.php";

$id   = $_GET["id"];
$data = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id")[0];

if (isset($_POST["edit"])) {

    if (edit($_POST) > 0) {
        echo "
                <script>
                    alert('Edit Data Berhasil !!!');
                    document.location.href = '?halaman=mahasiswa';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Edit Data Gagal !!!');
                    document.location.href = '?halaman=mahasiswa';
                </script>
            ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3><i class="fa-solid fa-school"></i>&ensp;Edit Data Mahasiswa</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data["id_mahasiswa"]; ?>">

                    <div class="form-group">
                        <label for="nik">NIK <span class="text-danger">*</span></label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="--Masukan NIK--" required autocomplete="off" value="<?= $data["nik"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM <span class="text-danger">*</span></label>
                        <input type="text" name="npm" id="npm" class="form-control" placeholder="--Masukan NPM--" required autocomplete="off" value="<?= $data["npm"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="--Masukan Nama Lengkap--" required autocomplete="off" value="<?= $data["nama_mhs"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="--Masukan Email--" required autocomplete="off" value="<?= $data["email"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="--Masukan Tempat Lahir--" required autocomplete="off" value="<?= $data["tempat_lahir"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="--Masukan Tanggal Lahir--" required autocomplete="off" value="<?= $data["tanggal_lahir"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jekel">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select custom-select" name="jekel" aria-label="Default select example">
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
                        <label for="no_tlp">No. Telepon <span class="text-danger">*</span></label>
                        <input type="number" name="no_tlp" id="no_tlp" class="form-control" placeholder="--Masukan No. Telepon Aktif--" autocomplete="off" required value="<?= $data["nomor_telpon"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="5" placeholder="--Masukan Alamat Lengkap--" autocomplete="off" required><?= $data["alamat"]; ?></textarea>
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
                        <label for="id_prodi">Program Studi <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="id_prodi" id="id_prodi" aria-label="Default select example">
                            <option selected>--Pilih Program Studi Terdaftar--</option>
                            <?php
                            $query_prodi = mysqli_query($conn, "SELECT * FROM prodi");
                            while ($data_prodi = mysqli_fetch_array($query_prodi)) {
                                echo '<option value="' . $data_prodi['id_prodi'] . '">' . $data_prodi['nama_prodi'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenjang">Jenjang Studi <span class="text-danger">*</span></label>
                        <select class="form-select custom-select" name="jenjang" aria-label="Default select example">
                            <option selected>--Pilih Jenjang Studi--</option>
                            <option value="S1" <?php if ($data['jenjang'] == 'S1') {
                                                    echo 'selected';
                                                } ?>>S1</option>
                            <option value="D3" <?php if ($data['jenjang'] == 'D3') {
                                                    echo 'selected';
                                                } ?>>D3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas <span class="text-danger">*</span></label>
                        <select class="form-select custom-select" name="kelas" aria-label="Default select example">
                            <option selected>--Pilih Kelas--</option>
                            <option value="Reguler" <?php if ($data['kelas'] == 'Reguler') {
                                                        echo 'selected';
                                                    } ?>>Reguler</option>
                            <option value="Non Reguler" <?php if ($data['kelas'] == 'Non Reguler') {
                                                            echo 'selected';
                                                        } ?>>Non-Reguler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelompok">Kelompok <span class="text-danger">*</span></label>
                        <input type="number" name="kelompok" id="kelompok" class="form-control" placeholder="--Masukan Kelompok--" autocomplete="off" required value="<?= $data["kelompok"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-select custom-select" name="status" aria-label="Default select example">
                            <option selected>--Pilih Status--</option>
                            <option value="Aktif" <?php if ($data['status_mhs'] == 'Aktif') {
                                                        echo 'selected';
                                                    } ?>>Aktif</option>
                            <option value="Tidak Aktif" <?php if ($data['status_mhs'] == 'Tidak Aktif') {
                                                            echo 'selected';
                                                        } ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="edit" class="btn btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=mahasiswa" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>