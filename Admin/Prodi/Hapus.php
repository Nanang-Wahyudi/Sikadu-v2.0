<?php  
require 'Functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('Hapus Data Berhasil !!!');
            document.location.href='?halaman=prodi';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Hapus Data Gagal !!!');
            document.location.href='?halaman=prodi';
        </script>
    ";
}
