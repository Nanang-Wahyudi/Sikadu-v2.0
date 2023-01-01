<?php
require 'Functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Simpan Data Berhasil !!!');
                document.location.href = '?halaman=prodi';            
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Simpan Data Gagal !!!');
                document.location.href = '?halaman=prodi';            
            </script>
        ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3 class="ml-2"><i class="fa-solid fa-school"></i>&ensp;Tambah Data Program Studi</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="id_fakultas">Fakultas <span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="id_fakultas" id="id_fakultas" aria-label="Default select example">
                            <option selected>--Pilih Fakultas Terdaftar--</option>
                            <?php
                            $query_fakultas = mysqli_query($conn, "SELECT * FROM fakultas");
                            while ($data = mysqli_fetch_array($query_fakultas)) {
                                echo '<option value="' . $data['id_fakultas'] . '">' . $data['nama_fakultas'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Program Studi <span class="text-danger">*</span></label>
                        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" placeholder="--Masukan Nama Program Studi--" required autocomplete="off">
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=prodi" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>