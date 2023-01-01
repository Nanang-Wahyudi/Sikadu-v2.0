<?php
require 'Functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Simpan Data Berhasil !!!');
                document.location.href = '?halaman=dosen';            
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Simpan Data Gagal !!!');
                document.location.href = '?halaman=dosen';            
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
                    <div class="form-group">
                        <label for="nip">NIP <span class="text-danger">*</span></label>
                        <input type="number" name="nip" id="nip" class="form-control" placeholder="--Masukan NIP Dosen--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="gelar_depan">Gelar Depan</label>
                        <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" placeholder="--Masukan Gelar Depan--" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" placeholder="--Masukan Nama Lengkap Dosen--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="gelar_belakang">Gelar Belakang <span class="text-danger">*</span></label>
                        <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control" placeholder="--Masukan Nama Lengkap Dosen--" required autocomplete="off">
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
                        <select class="custom-select" name="jekel_dosen" id="jekel_dosen">
                            <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_dosen">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat_dosen" id="alamat_dosen" class="form-control" cols="20" rows="5" placeholder="--Masukan Alamat Lengkap--" autocomplete="off" required></textarea>
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=dosen" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>