<?php
require 'Functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Simpan Data Berhasil !!!');
                document.location.href = '?halaman=fakultas';            
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Simpan Data Gagal !!!');
                document.location.href = '?halaman=fakultas';            
            </script>
        ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3 class="ml-4"><i class="fa-solid fa-building-columns"></i>&ensp;Tambah Data Fakultas</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama_fakultas">Fakultas <span class="text-danger">*</span></label>
                        <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" placeholder="--Masukan Nama Fakultas--" required autocomplete="off">
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                        <button type="reset" name="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=fakultas" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>