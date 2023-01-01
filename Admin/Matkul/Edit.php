<?php
require "Functions.php";

$id   = $_GET["id"];
$data = query("SELECT * FROM matakuliah WHERE id_matakuliah = $id")[0];

if (isset($_POST["edit"])) {

    if (edit($_POST) > 0) {
        echo "
                <script>
                    alert('Edit Data Berhasil !!!');
                    document.location.href = '?halaman=matkul';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Edit Data Gagal !!!');
                    document.location.href = '?halaman=matkul';
                </script>
            ";
    }
}

?>

<div class="container row">
    <div class="col-md-7">
        <h3 class="ml-4"><i class="fa-solid fa-book"></i>&ensp;Edit Data Mata Kuliah</h3>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card mt-5 border-success">
            <div class="card-body bg-light">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data["id_matakuliah"]; ?>">

                    <div class="form-group">
                        <label for="matkul">Mata Kuliah <span class="text-danger">*</span></label>
                        <input type="text" name="matkul" id="matkul" class="form-control" placeholder="--Masukan Nama Mata Kuliah--" required autocomplete="off" value="<?= $data["nama_matkul"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS <span class="text-danger">*</span></label>
                        <input type="number" name="sks" id="sks" class="form-control" placeholder="--Masukan Jumlah SKS--" required autocomplete="off" value="<?= $data["sks"]; ?>">
                    </div>
                    <div class="float-right mt-2">
                        <button type="submit" name="edit" class="btn btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="?halaman=matkul" class="btn btn-outline-primary mt-4" type="submit"><i class="fa-solid fa-angles-left mr-2"></i>Kembali</a>
    </div>
</div>