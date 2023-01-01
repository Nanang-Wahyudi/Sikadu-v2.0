<?php
require 'Functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Simpan Data Berhasil !!!');
                document.location.href = '?halaman=mahasiswa';            
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Simpan Data Gagal !!!');
                document.location.href = '?halaman=mahasiswa';            
            </script>
        ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3><i class="fa-solid fa-school"></i>&ensp;Tambah Data Mahasiswa</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nik">NIK <span class="text-danger">*</span></label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="--Masukan NIK--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM <span class="text-danger">*</span></label>
                        <input type="text" name="npm" id="npm" class="form-control" placeholder="--Masukan NPM--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="--Masukan Nama Lengkap--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="--Masukan Email--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="--Masukan Tempat Lahir--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="--Masukan Tanggal Lahir--" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jekel">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="custom-select" name="jekel" id="jekel">
                            <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">No. Telepon <span class="text-danger">*</span></label>
                        <input type="number" name="no_tlp" id="no_tlp" class="form-control" placeholder="--Masukan No. Telepon Aktif--" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="5" placeholder="--Masukan Alamat Lengkap--" autocomplete="off" required></textarea>
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
                        <select class="custom-select" name="jenjang" id="jenjang">
                            <option selected>--Pilih Jenjang Studi--</option>
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas <span class="text-danger">*</span></label>
                        <select class="custom-select" name="kelas" id="kelas">
                            <option selected>--Pilih Kelas--</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Non Reguler">Non-Reguler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelompok">Kelompok <span class="text-danger">*</span></label>
                        <input type="number" name="kelompok" id="kelompok" class="form-control" placeholder="--Masukan Kelompok--" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="custom-select" name="status" id="status">
                            <option selected>--Pilih Status--</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=mahasiswa" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>