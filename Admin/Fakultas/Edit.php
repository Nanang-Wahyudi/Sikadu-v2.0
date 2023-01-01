<?php
require "Functions.php";

$id   = $_GET["id"];
$data = query("SELECT * FROM fakultas WHERE id_fakultas = $id")[0];

if (isset($_POST["edit"])) {

    if (edit($_POST) > 0) {
        echo "
                <script>
                    alert('Edit Data Berhasil !!!');
                    document.location.href = '?halaman=fakultas';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Edit Data Gagal !!!');
                    document.location.href = '?halaman=fakultas';
                </script>
            ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3 class="ml-4"><i class="fa-solid fa-building-columns"></i>&ensp;Edit Data Fakultas</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-warning">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data["id_fakultas"]; ?>">

                    <div class="form-group">
                        <label for="nama_fakultas">Fakultas <span class="text-danger">*</span></label>
                        <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" placeholder="--Masukan Nama Fakultas--" required autocomplete="off" value="<?= $data["nama_fakultas"] ?>">
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="edit" class="btn btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=fakultas" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>