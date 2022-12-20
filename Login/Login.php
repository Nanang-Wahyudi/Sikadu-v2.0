<?php 
    if (isset($_POST['btnLogin'])) {
        $username = $_POST['frmUsername'];
        $password = $_POST['frmPassword'];

        if ($username == "Admin" && $password == "admin123") {
            header('location:../Admin/Tampilan.php');
        } elseif ($username == "User" && $password == "user123") {
            header('location:../User/Tampilan.php');
        } else {
            header('location:../index.php?pesan=Username Atau Password Salah');
        }
    }
?>